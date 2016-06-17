<!DOCTYPE html>
<html>
<head>
	<title>Framework</title>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="<?=APP_W.'pub/js/app.js'; ?>"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

</head>
<body>

<header>
	<div align="right">
	<form action="<?=APP_W.'home/login';?>" method="post" id="form-log"><!--<APP_W.'home/login';>-->
	<p>Email:<input name="email" type="text">
	Password:<input name="password" id="pass" type="password">
	<input class="bt" type="submit"  value="Entra">
	</p>
	</form>
	<!--<p ><a href="#">Anonim</a>
	<a href="<?=APP_W.'home/registry';?>">Registrat!</a></p>-->
	</div>
	<h1><a href="<?=APP_W;?>"> View -<?= $title; ?></a></h1>
</header>

	