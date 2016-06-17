<?php

	class mDashboard extends Model{

		function __construct(){
			parent::__construct();
			
		}



	function in_anunci($titulo,$data_publicacio,$descripcio,$estat){
  //echo 'prova funcionament';
  try{
     $sql="INSERT INTO anuncis (Titulo,data_publicacio,Descripcio,Estat) VALUES (:titulo,:data,:descripcio,:estat)";//base de datos 
     $this->query($sql);
     $this->bind(":titulo",$titulo);
     $this->bind(":data",$data_publicacio);
     $this->bind(":descripcio",$descripcio);
     $this->bind(":estat",$estat);
     $this->execute();
    


     $this->debugDumpParams();
     if(($this->rowcont())==1){
           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}// in_anunci





  function mostrar_usuarios(){
      $this->query('SELECT * FROM usuaris');
      $this->execute();
      $resultat= $this->resultset(); //retorna tot el registres en un array
      return $resultat;
      
    }//mostrar_usuarios

     function eliminar_usuarios($id){
      $this->query('DELETE FROM usuaris WHERE id_usuaris=:id');
      $this->bind(":id",$id);
      $this->execute();
    }//eliminar_usuarios


    function editar_formulario($id){
      $this->query('SELECT id_usuaris,Nom,Contrassenya,Email,Telefon,Rol_id_rol FROM usuaris WHERE id_usuaris = :id');
      $this->bind(":id",$id);
      $this->execute();
      $result=$this->single(); //model.php
      return $result;
    }//editar_formulario

    function editar_usuario($id,$nombre,$passwd,$email,$tel,$rol){
      $this->query('UPDATE  usuaris SET Nom=:nombre,Contrassenya=:passwd,Email=:email,Telefon=:tel,Rol_id_rol=:rol WHERE id_usuaris = :id');
      $this->bind(":id",$id);
      $this->bind(":nombre",$nombre);
      $this->bind(":passwd",$passwd);
      $this->bind(":email",$email);
      $this->bind(":tel",$tel);
      $this->bind(":rol",$rol);
      $this->execute();
      
    }//editar_formulario




}

