<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	$model->origen,
);

$this->menu=array(
	array('label'=>'Lista de Origenes', 'url'=>array('index')),
	array('label'=>'Crear Origen', 'url'=>array('create')),
	array('label'=>'Uctualizar Origen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Origen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'seguro que desea borrar este Origen?')),
	array('label'=>'Administrar Origenes', 'url'=>array('admin')),
);
?>

<h1>Ver Origen <?php echo $model->origen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'origen',
	),
)); ?>
