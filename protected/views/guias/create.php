<?php
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Guias', 'url'=>array('index')),
	array('label'=>'Manage Guias', 'url'=>array('admin')),
);
?>

<h1>Create Guias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>