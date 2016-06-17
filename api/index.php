<?php

require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

//get --> leer
//post--> crear
//put--> actualizar
//delete --> eliminar

$app->get('/usuaris','leerusuarios');
$app->post('/usuaris','crearusuarios');
$app->put('/usuaris','actualizarusuarios');
$app->delete('/usuaris','eliminarusuarios');


function leerusuarios(){

$db= new PDO('mysql:host=localhost;dbname=mydb','root','');
$stmt=$db->query("SELECT * FROM usuaris");
$res=$stmt->fetchAll();
$res=json_encode($res);
header('Content-Type:application/json');
echo $res;
exit();
$db=null;

}//leerusuarios


function crearusuarios(){

	$db= new PDO('mysql:host=localhost;dbname=mydb','root','');

    $request = \Slim\Slim::getInstance()->request();
    $user = $request->params();

    $stmt1 = $db->prepare("SELECT Email FROM ususaris WHERE Email = :email2");
    $stmt1->bindParam(":email2",$user['email'],PDO::PARAM_STR);
    $stmt1->execute();
    $my = $stmt1->rowCount();

    if($my == 0){
        $stmt = $db->prepare("INSERT INTO usuaris(usuari,Contrassenya,Email,Telefon) VALUES(:username,:password,:email,:tel)");
        $stmt->bindParam(":username",$user['user'],PDO::PARAM_STR);
        $stmt->bindParam(":password",$user['pass'],PDO::PARAM_STR);
        $stmt->bindParam(":email",$user['email'],PDO::PARAM_STR);
        $stmt->bindParam(":tel",$user['tel'],PDO::PARAM_STR);
        // $stmt->bindParam(":rol",$user['rol'],PDO::PARAM_INT);
        // $stmt->bindParam(":city",$user['city'],PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->rowCount();

        echo "Usuari afegit!";
        // die();
    }
    else
    {
        echo "No pots introduir un usuari amb el mateix correu electrònic";
    }

    exit();
    $db=null;

}//crearusuarios


function actualizarusuarios(){


	$db= new PDO('mysql:host=localhost;dbname=mydb','root','');

    $request = \Slim\Slim::getInstance()->request();
    $params = $request->params();

    if(isset($params['id']))
    {   
        $stmt = $db->prepare("SELECT * FROM usuaris WHERE id_usuari = :id");
        $stmt->bindParam(":id",$params['id'],PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetchAll();

        if(isset($params['usuari']))
        {
            $usuari = $params['usuari'];
        }
        else
        {
            $usuari = $res[0]['usuari'];
        }

        if(isset($params['pass']))
        {
            $pass = $params['pass'];
        }
        else
        {
            $pass = $res[0]['pass'];
        }

        if(isset($params['email']))
        {
            $email = $params['email'];
        }
        else
        {
            $email = $res[0]['email'];
        }

        if(isset($params['phone']))
        {
            $phone = $params['phone'];
        }
        else
        {
            $phone = $res[0]['phone'];
        }

        if(isset($params['rol']))
        {
            $rol = (integer)$params['rol'];
        }
        else
        {
            $rol = (integer)$res[0]['rol'];
        }

        if(isset($params['poblacio']))
        {
            $poblacio = (integer)$params['poblacio'];
        }
        else
        {
            $poblacio = (integer)$res[0]['poblacio'];
        }


        $upd = $db->prepare("UPDATE usuaris SET usuari = :user, password = :pass, email = :email, phone = :phone,
                            rol = :rol, poblacio = :poblacio WHERE id_user = :id");

        $upd->bindParam(":user",$usuari,PDO::PARAM_STR);
        $upd->bindParam(":pass",$pass,PDO::PARAM_STR);
        $upd->bindParam(":email",$email,PDO::PARAM_STR);
        $upd->bindParam(":phone",$phone,PDO::PARAM_STR);
        $upd->bindParam(":rol",$rol,PDO::PARAM_INT);
        $upd->bindParam(":poblacio",$poblacio,PDO::PARAM_INT);
        $upd->bindParam(":id",$params['id_user'],PDO::PARAM_INT);
        $upd->execute();
        $resupd = $upd->rowCount();

        if($resupd > 0)
        {
            echo "Usuario actualizado correctamente";
        }
        else
        {
            echo "No se ha podido actualizar el usuario";
        }

        }
    else{
        echo "no hay id";
    }

    exit();
    $db=null;
}//actualizarusuarios



function eliminarusuarios(){

	$db= new PDO('mysql:host=localhost;dbname=mydb','root','');

    $request = \Slim\Slim::getInstance()->request();
    $params = $request->params();

    $stmt = $db->prepare("DELETE FROM usuaris WHERE id_usuaris = :id");
    $stmt->bindParam(":id",$params['id'],PDO::PARAM_INT);
    $stmt->execute();
    $resupd = $stmt->rowCount();


    if($resupd > 0)
    {
        echo "Usuari eliminat!";
    }
    else
    {
        echo "No sha eliminat l'usuari";
    }
    exit();
    $db=null;
}//eliminarusuarios


$app->run();