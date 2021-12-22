<?php
class Events extends Controller{

	protected function list($param){
		//echo "In Events List, param: " . $param;
		$viewmodel = new EventModel($param);
		$this->returnView($viewmodel->list($param), true);
	}
}