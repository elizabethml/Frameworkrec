<?php
	
	class Dashboard extends Controller{
		protected $model;
		protected $view;
		protected $conf;
		
		
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mDashboard;
			$this->view=new vDashboard;
		}
		function home(){			
		}
		

		 function crear_anuncio(){
          $data_publicacio=date("Y-m-d H:i:s");
          $titulo=filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
          $descripcio=filter_input(INPUT_POST, 'descripcio', FILTER_SANITIZE_STRING);
          $estat=filter_input(INPUT_POST, 'estat', FILTER_SANITIZE_STRING);
          $val=$this->model->in_anunci($titulo,$data_publicacio,$descripcio,$estat);
 		}//crear_anuncio


 		 /*function editar_usuario(){
          $data_publicacio=date("Y-m-d H:i:s");
          $titulo=filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
          $descripcio=filter_input(INPUT_POST, 'descripcio', FILTER_SANITIZE_STRING);
          $estat=filter_input(INPUT_POST, 'estat', FILTER_SANITIZE_STRING);
          $val=$this->model->in_anunci($titulo,$data_publicacio,$descripcio,$estat);

 		}//editar_usuario*/


 	


 		function mostrar_usuarios(){
 			$usuarios=$this->model->mostrar_usuarios();
 			$this->ajax_set($usuarios); //transforma array a json

 		}//mostrar_usuarios


 		function eliminar_usuarios(){

 			$user=$_POST['idusuario']; //appjs
 			$delete=$this->model->eliminar_usuarios($user);
 			//$this->ajax_set($delete);

 		}//eliminar_usuarios

 		function editar_formulario(){
 			$id=$_POST['idusuario'];
 			$editar=$this->model->editar_formulario($id);//mdashboard
 			$this->ajax_set($editar);

 		}

 		function editar_usuario(){
 			$id=$_POST['idusuario'];
 			$nombre=$_POST['nombre'];
 			$passwd=$_POST['passwd'];
 			$email=$_POST['email'];
 			$tel=$_POST['tel'];
 			$rol=$_POST['rol'];
 			$this->model->editar_usuario($id,$nombre,$passwd,$email,$tel,$rol);//mdashboard

 		}
 		 
	}