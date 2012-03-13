<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	$model->origen=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Origenes', 'url'=>array('index')),
	array('label'=>'Crear Origen', 'url'=>array('create')),
	array('label'=>'Ver Origen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Origenes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Origen <?php echo $model->origen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>