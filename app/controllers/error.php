<?php
	final class Error extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mdashboard;
			$this->view=new vdashboard;
		}
		function home(){
			
			
		}
	}