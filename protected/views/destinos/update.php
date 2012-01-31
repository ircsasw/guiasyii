<?php
$this->breadcrumbs=array(
	'Destinoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Destinos', 'url'=>array('index')),
	array('label'=>'Create Destinos', 'url'=>array('create')),
	array('label'=>'View Destinos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Destinos', 'url'=>array('admin')),
);
?>

<h1>Update Destinos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>