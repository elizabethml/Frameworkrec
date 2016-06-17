<?php
	
	class admin extends Controller{
		protected $model;
		protected $view;
		protected $conf;
		
		
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->view=new vadmin;
		}


		function home(){			
		}

	}