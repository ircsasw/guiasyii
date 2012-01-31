<?php
$this->breadcrumbs=array(
	'Destinoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Destinos', 'url'=>array('index')),
	array('label'=>'Create Destinos', 'url'=>array('create')),
	array('label'=>'Update Destinos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Destinos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Destinos', 'url'=>array('admin')),
);
?>

<h1>View Destinos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'destino',
	),
)); ?>
