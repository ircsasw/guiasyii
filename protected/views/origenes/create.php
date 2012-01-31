<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Origenes', 'url'=>array('index')),
	array('label'=>'Manage Origenes', 'url'=>array('admin')),
);
?>

<h1>Create Origenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>