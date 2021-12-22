<?php
class Beers extends Controller{

	protected function list($param){
		//echo "In Beer List, param: " . $param;
		$viewmodel = new BeerModel($param);
		$this->returnView($viewmodel->list($param), true);
	}
}