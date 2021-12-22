<?php
abstract class Controller{
	protected $action;
	protected $param;
	protected $payload;

	public function __construct($action, $param, $payload){
		$this->action = $action;
		$this->param = $param;		
		$this->payload = $payload;

	}

	public function executeAction(){
		return $this->{$this->action}($this->param, $this->payload);
	}

	protected function returnView($viewmodel, $fullview){
		$view = 'views/'. get_class($this). '/' . $this->action. '.php';
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
		}
	}
}