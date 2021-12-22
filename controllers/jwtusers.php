<?php
class Jwtusers extends Controller{

	protected function login(){
		$viewmodel = new JwtuserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function authorization(){
		$viewmodel = new JwtuserModel();
		$this->returnView($viewmodel->authorization(), true);
	}

}
