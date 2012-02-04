<?php
$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Destinos', 'url'=>array('index')),
	array('label'=>'Create Destinos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('destinos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Destinos</h1>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'destinos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'value'=>'$data->id',
			'selectableRows'=>10,
			'id'=>'chk'
		),
		'id',
		'destino',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
