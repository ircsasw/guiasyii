<?php

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Guias', 'url'=>array('index')),
	array('label'=>'Crear Guia', 'url'=>array('asigna')),
	array('label'=>'Catálogo', 'url'=>array('crearepo')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('guias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Guias</h1>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
		'fecha_asig',
		array(
			'name'=>'id_origen',
			'value'=>'$data->idOrigen->origen',
		),
		array(
			'name'=>'id_asigna',
			'value'=>'$data->idUsuarioA->nombre'
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
