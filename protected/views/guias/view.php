<?php
$this->breadcrumbs=array(
	'Guiases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Guias', 'url'=>array('index')),
	array('label'=>'Create Guias', 'url'=>array('create')),
	array('label'=>'Update Guias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Guias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guias', 'url'=>array('admin')),
);
?>

<h1>View Guias #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'serie',
		'folio',
		'fecha_asig',
		'id_origen',
		'id_asigna',
		'fecha_baja',
		'id_destino',
		'id_baja',
	),
)); ?>
