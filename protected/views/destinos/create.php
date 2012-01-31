<?php
$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Destinos', 'url'=>array('index')),
	array('label'=>'Manage Destinos', 'url'=>array('admin')),
);
?>

<h1>Create Destinos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>