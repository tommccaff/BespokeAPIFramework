<?php
class Merch extends Controller{

	protected function list($param){
		//echo "In Merch List, param: " . $param;
		$viewmodel = new MerchModel($param);
		$this->returnView($viewmodel->list($param), true);
	}
}