<?php
class Bootstrap{
	private $request_method;
	private $request;	
	private $controller;
	private $action;
	private $param;
	private $payload;

	public function __construct($request_method, $request, $payload){
		$this->request_method = $request_method;		
		$this->request = $request;
		$this->payload = $payload;

		if($this->request['controller'] == ""){
			$this->controller = 'error';
		} else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'error';
		} else {
			$this->action = $this->request['action'];
		}
		if($this->request['param'] != ""){
			$this->param = $this->request['param'];
		}		
	}

	public function createController(){

		// Check Class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->param, $this->payload);
				} else {
					// Method Does Not Exist
					echo '<h1>Method ' . $this->action . ' does not exist in model ' . $this->controller . '</h1>';
					return;
				}
			} else {
				// Base Controller Does Not Exist
				echo '<h1>Base controller not found</h1>';
				return;
			}
		} else {
			// Controller Class Does Not Exist
			echo '<h1>Controller class ' . $this->controller . ' does not exist</h1>';
			return;
		}
	}
}