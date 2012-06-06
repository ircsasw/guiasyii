<?php
$this->breadcrumbs=array(
	'Guiases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Crear Guias', 'url'=>array('asigna')),
	array('label'=>'Editar Guia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Guia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que desea eliminar esta guia?')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Ver Guia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'factura',
		'folio',
		'zona',
		'fecha_asig',
		'id_origen',
		'id_asigna',
		'fecha_baja',
		'id_destino',
		'id_baja',
	),
)); ?>
