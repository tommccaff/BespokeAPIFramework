<?php
class Settings extends Controller{

	protected function list($param){
		//echo "In Setting List, param: " . $param;
		$viewmodel = new SettingModel($param);
		$this->returnView($viewmodel->list($param), true);
	}
}