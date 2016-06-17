<?php

	class mAdmin extends Model{

		function __construct(){
			parent::__construct();
			
		}



//insertar,actualizar,etc

	function in_anunci($titulo,$data_publicacio,$descripcio,$estat){
  //echo 'prova funcionament';
  try{
     $sql="SELECT * FROM usuaris";//base de datos 
     $this->query($sql);
     $this->execute();
     $result=$this->single(); //guarda array


   if(($this->rowcont())==1){
  
           Session::set('rol',$result['Rol_id_rol']);
           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}
}