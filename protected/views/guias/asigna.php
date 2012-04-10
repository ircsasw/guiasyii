<?php
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Asignar Guias</h1>

<?php echo $this->renderPartial('_formasigna', array('modelasigna'=>$modelasigna)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guias-grid',
	'dataProvider'=>$modeladmin->search(),
	'filter'=>$modeladmin,
	'columns'=>array(
		array(
		'class'=>'CCheckBoxColumn',
		'value'=>'$data->id',
		'selectableRows'=> 10,
		'id'=>'chk',
		),
		//'id',
		'serie',
		'folio',
		array(
			'name'=>'fecha_asig',
			'value'=>"Yii::app()->dateFormatter->format('dd-MM-yyyy','dd-MM-yy')",
		),
		array(
			'name'=>'origen_search',
			'value'=>'$data->idOrigen->origen',
		),
		array(
			'name'=>'asigna_search',
			'value'=>'$data->idUsuarioA->usuario',
		),
		array(
			'name'=>'fecha_baja',
			'value'=>"Yii::app()->dateFormatter->format('dd-MM-yyyy','dd-MM-yy')",
		),
		array(
			'name'=>'destino_search',
			'value'=>'$data->idDestino->destino',
		),
		array(
			'name'=>'baja_search',
			'value'=>'$data->idUsuarioB->usuario',
		),
		/*
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>