<?php
$this->breadcrumbs=array(
	'Guiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guias', 'url'=>array('index')),
	array('label'=>'Create Guias', 'url'=>array('create')),
	array('label'=>'View Guias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guias', 'url'=>array('admin')),
);
?>

<h1>Update Guias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>