<?php
class EventModel extends Model{

	public function list($param){

		$curmonth = intval(date("m"));
		$curyear = intval(date("Y"));

		$this->query('SELECT * FROM events WHERE AppID=:AppID AND EventYear >= :curyear AND EventMonth >= :curmonth ORDER BY EventYear, EventMonth, EventDay DESC');
		$this->bind(':AppID', $param);
		$this->bind(':curyear', $curyear);
		$this->bind(':curmonth', $curmonth);
		$rows = $this->resultSet();

		return $rows;
	}	
}