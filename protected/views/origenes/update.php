<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Origenes', 'url'=>array('index')),
	array('label'=>'Create Origenes', 'url'=>array('create')),
	array('label'=>'View Origenes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Origenes', 'url'=>array('admin')),
);
?>

<h1>Update Origenes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>