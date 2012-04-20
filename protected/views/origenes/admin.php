<?php
$this->breadcrumbs=array(
	'Origenes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Origenes', 'url'=>array('index')),
	array('label'=>'Crear Origen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('origenes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Origenes</h1>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'origenes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array ('class'=>'CCheckBoxColumn',
		'value' => '$data->id',
		'selectableRows'=>10,
		'id'=> 'chk',
		),
		//'id',
		'origen',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
