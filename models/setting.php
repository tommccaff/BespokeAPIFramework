<?php
class SettingModel extends Model{

	public function list($param){
		
		$this->query('SELECT * FROM settings WHERE AppID=:AppID');
		$this->bind(':AppID', $param);
		$rows = $this->resultSet();

		return $rows;
	}	
}