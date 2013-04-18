<?php
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Crear Guias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>