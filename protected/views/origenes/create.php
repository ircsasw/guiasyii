<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Origenes', 'url'=>array('index')),
	array('label'=>'Administrar Origenes', 'url'=>array('admin')),
);
?>

<h1>Crear Origenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>