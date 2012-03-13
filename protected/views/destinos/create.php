<?php
$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Destinos', 'url'=>array('index')),
	array('label'=>'Administrar Destinos', 'url'=>array('admin')),
);
?>

<h1>Crear Destinos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>