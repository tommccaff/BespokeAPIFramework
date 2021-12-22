<?php
class BeerModel extends Model{

	public function list($param){
		$this->query('SELECT * FROM beers WHERE AppID=:AppID ORDER BY DisplayOrder ASC');
		$this->bind(':AppID', $param);
		$rows = $this->resultSet();

		return $rows;
	}	
}