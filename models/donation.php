<?php
class DonationModel extends Model{

	public function create($param, $payload){

		$payload_obj = json_decode($payload);
		
		if($payload_obj->{'AppID'} == '' || $payload_obj->{'emailaddr'} == '' || $payload_obj->{'donation'} == ''){

			// BAD DATA IN PAYLOAD
			return NULL;
		}

		// Insert into MySQL
		
		$this->query('INSERT INTO donations (AppID, emailaddr, donation) VALUES(:AppID, :emailaddr, :donation)');
		$this->bind(':AppID', $payload_obj->{'AppID'});
		$this->bind(':emailaddr', $payload_obj->{'emailaddr'});
		$this->bind(':donation', $payload_obj->{'donation'});
		$this->execute();

		// Send the most recent SeqID as verification of query success
		if($this->lastInsertId()){
			return $this->lastInsertId();
		} else {
			return NULL;
		}
	}	
}