<?php
	// first phase 
	// environment
	// developer mode 
	ini_set('display_errors','on');
	//informe de errores
	error_reporting(E_ALL);

	include 'config.php';
	require 'sys/helper.php';
	
	// Session proof
	Session::init();
	$id=Session::get('id');
	

	// reading configuration

	$conf=Registry::getInstance();
	
	$conf->welcome='Hola';  // __set()
	$msg=$conf->welcome;    // __get()
	
	Core::init();

	//creamos la sesion
	//session_start();
	//validamos si se ha hecho o no el inicio de sesion correctamente
	//si no se ha hecho la sesion nos regresará a login.php
	//if(!isset($_SESSION['usuario'])) 
	//{
	//  header('Location: login.php'); 
	//  exit();
	//}
	

	
