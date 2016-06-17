<?php
	/**
	 *  vHome
	 *  Prepares and loads the corresponding Template
	 *  @author Toni
	 * 
	 * */
	class vRegistro extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('registro',$this->view_data);
			
		}

	}