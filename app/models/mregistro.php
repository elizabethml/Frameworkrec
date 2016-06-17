<?php

	class mRegistro extends Model{

		function __construct(){
			parent::__construct();
			
		}


function registro($nom,$cognoms,$user,$password,$direccio,$email,$telefon){
  //echo 'prova funcionament';
  //single


  try{

    //CALL procedimiento  phpmyadmin
     $sql="INSERT INTO usuaris (Nom,Cognoms,usuari,Contrassenya,Direccio,Email,Telefon,Rol_id_rol) VALUES (:nom,:cognoms,
                                :user,:paswd,:direccio,:email,:telefon,2)";//base de datos Email i Contrassenya
     $this->query($sql);
     $this->bind(":nom",$nom);
     $this->bind(":cognoms",$cognoms);
     $this->bind(":user",$user);
     $this->bind(":paswd",$password);
     $this->bind(":direccio",$direccio);
     $this->bind(":email",$email);
     $this->bind(":telefon",$telefon);
     $this->execute();
    //


     $this->debugDumpParams();
     if(($this->rowcont())==1){
           Session::set('email',$email);

           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}

}//mregistro