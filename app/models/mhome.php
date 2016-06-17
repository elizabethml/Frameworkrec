<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

function login($email,$password){
  //echo 'prova funcionament';
  try{
     $sql="SELECT * FROM usuaris WHERE Email=? AND Contrassenya=?";//base de datos Email i Contrassenya
     $this->query($sql);
     $this->bind(1,$email);
     $this->bind(2,$password);
     $this->execute();
     $result=$this->single(); //guarda array
    // $this->debugDumpParams();
     if(($this->rowcont())==1){
           Session::set('email',$email);
           Session::set('rol',$result['Rol_id_rol']);
           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}



function mostrar_anuncios(){

      $sql="SELECT * FROM anuncis";
      $this->query($sql);
      $this->execute();
      $anuncis = $this->resultSet();;
      return $anuncis;


}

}//class model


