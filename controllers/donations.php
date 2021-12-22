<?php
class Donations extends Controller{

	protected function create($param, $payload){
		//echo "In Donation List, param: " . $param;
		$viewmodel = new DonationModel($param, $payload);
		$this->returnView($viewmodel->create($param, $payload), true);
	}
}