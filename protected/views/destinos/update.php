<?php
$this->breadcrumbs=array(
	'Destinoses'=>array('index'),
	$model->destino=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Destinos', 'url'=>array('index')),
	array('label'=>'Crear Destino', 'url'=>array('create')),
	array('label'=>'Ver Destino', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Destinos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Destino <?php echo $model->destino; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>