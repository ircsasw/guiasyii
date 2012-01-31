<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Origenes', 'url'=>array('index')),
	array('label'=>'Create Origenes', 'url'=>array('create')),
	array('label'=>'Update Origenes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Origenes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Origenes', 'url'=>array('admin')),
);
?>

<h1>View Origenes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'origen',
	),
)); ?>
