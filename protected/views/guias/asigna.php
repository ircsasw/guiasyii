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
		'fecha_asig',//=>date('d-m-y', CDateTimeParser::parse($modeladmin->fecha_asig, Yii::app()->locale->getDateFormat('medium'))),
		array(
			'name'=>'id_origen',
			'value'=>'$data->idOrigen->origen',
		),
		array(
			'name'=>'id_asigna',
			'value'=>'$data->idUsuarioA->usuario',
		),
		
		'fecha_baja',
		array(
			'name'=>'id_destino',
			'value'=>'$data->idDestino->destino',
		),
		array(
			'name'=>'id_baja',
			'value'=>'$data->idUsuarioB->usuario',
		),
		/*
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>