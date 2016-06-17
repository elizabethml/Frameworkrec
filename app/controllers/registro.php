<?php
	final class Registro extends Controller{
		protected $model;
		protected $view;
		protected $conf;

		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mregistro;
			$this->view=new vregistro;
			 
		}
		function home(){
			
			
		}

 		 function regis(){
   		if(!empty($_POST['email'])){

          $nom=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);//registro.php
          $cognoms=filter_input(INPUT_POST, 'cognoms', FILTER_SANITIZE_STRING);//registro.php
          $user=filter_input(INPUT_POST, 'usuari', FILTER_SANITIZE_STRING);//registro.php
          $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);//registro.php
          $direccio=filter_input(INPUT_POST, 'direccio', FILTER_SANITIZE_STRING);//registro.php
          $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //registro.php
          $telefon=filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING);//registro.php
         		 
         
          $val=$this->model->registro($nom,$cognoms,$user,$password,$direccio,$email,$telefon);
         
          if ($val == TRUE){
               //setcookie('usuari',Session::get('usuari')); 
               Session::set('email',$email);           
               header('Location:'.APP_W.'dashboard');
           }
           else{ 
            //$output=array('redirect'=>APP_W.'home');
             //$this->ajax_set($output);
             header('Location:'.APP_W.'home');

           }

         
    }
    else {
      echo "Has d'omplir tots els camps del formulari!";
    }

 }

}//controller