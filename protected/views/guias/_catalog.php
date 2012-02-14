<h1>Hola mundo!!</h1>
<?php 
foreach ($model as $value) {
	echo ' / '. $value->id;
	echo ' - '. $value->serie;
}

?>