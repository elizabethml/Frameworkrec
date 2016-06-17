<?php
	
	class Home extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome();
			$this->view= new vHome();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}


function login(){
   if(isset($_POST['email'])){
         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //HEAD
         $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);//HEAD
        
        
         $user=$this->model->login($email,$password);
         if ($user== TRUE){

              setcookie('usuari',Session::get('email'));
              Session::set('email',$email); 
              $output=array('redirect'=>APP_W.'dashboard');
              $this->ajax_set($output);
              //header('Location:'.APP_W.'dashboard');
              //echo 'Benvingut '.$email;

          }
          else{ 
             $output=array('redirect'=>APP_W.'home');
             $this->ajax_set($output);
          	 //header('Location:'.APP_W.'home');

          }
   }
 }

function logout(){
 //Destruir Sesión
 session_destroy();
 //Redireccionar al registrar nuevo usuario
header('Location:'.APP_W.'home');
 }


function mostrar_anuncios(){

  $result=$this->model->mostrar_anuncios();
  $this->ajax_set($result);
  
}




 }//funcion