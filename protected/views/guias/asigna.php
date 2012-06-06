<?php
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Crear',
);
//'ejecutar'=>'{inactivarChkd();}', 'url'=>'#', 'titulo'=>Yii::t('default', 'Inactivate'), 'clase'=>''),
$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
	//array('label'=>'eliminar','{Eliminar();}', 'url'=>'#', 'titulo'=>Yii::t('default', 'Inactivate'), 'clase'=>''),
);
?>

<h1>Asignar Guias</h1>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>

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
		array(
			'name'=>'factura',
			'htmlOptions'=>array('style'=>'width: 30px'),
		),
		array(
			'name'=>'folio',
			'htmlOptions'=>array('style'=>'width: 30px'),
		),
		array(
			'name'=>'zona',
			'htmlOptions'=>array('style'=>'width: 20px'),
		),
		'fecha_asig',
		/*array(
			'name'=>'fecha_asig',
			'value'=>Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse('fecha_asig', 'dd-MM-yyyy'),'medium',null)
		),*/
		array(
			'name'=>'origen_search',
			'value'=>'$data->idOrigen->origen',
		),
		array(
			'name'=>'asigna_search',
			'value'=>'$data->idUsuarioA->usuario',
		),
		'fecha_baja',
		/*
		array(
			'name'=>'fecha_baja',
			'value'=>"Yii::app()->dateFormatter->format('dd-MM-yyyy','dd-MM-yy')",
		),*/
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
));
?>