<?php
$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	$model->destino,
);

$this->menu=array(
	array('label'=>'Lista de Destinos', 'url'=>array('index')),
	array('label'=>'Crear Destino', 'url'=>array('create')),
	array('label'=>'Actualizar Destino', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Destino', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Destinos', 'url'=>array('admin')),
);
?>

<h1>Ver Destino <?php echo $model->destino; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'destino',
	),
)); ?>
