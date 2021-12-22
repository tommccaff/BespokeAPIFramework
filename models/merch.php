<?php
class MerchModel extends Model{

	public function list($param){
		
		$this->query('SELECT * FROM merch WHERE AppID=:AppID ORDER BY MerchItemOrder ASC');
		$this->bind(':AppID', $param);
		$rows = $this->resultSet();

		return $rows;
	}	
}