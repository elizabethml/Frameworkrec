<?php

$menu=array(
				'Inicio'=>APP_W.'home',
				'Registro'=>APP_W.'registro');

include 'common.php';

?>

<nav>

<?php

	mMenu::create($menu);

?>

</nav>
	
	
