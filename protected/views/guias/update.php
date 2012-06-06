<?php
$this->breadcrumbs=array(
	'Guiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Crear Guias', 'url'=>array('asigna')),
	array('label'=>'Ver Guia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Editar Guia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>