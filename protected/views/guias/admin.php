<?php

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Guias', 'url'=>array('index')),
	array('label'=>'Crear Guia', 'url'=>array('asigna')),
	//array('label'=>'Catálogo', 'url'=>array('crearepo')),
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

<div id="statusMsg">
<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>
</div>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php /*
$deleteUrl = $this->createUrl('guias/delete');
$this->widget('zii.widgets.jui.CJuiButton', array(
		'name' => 'btnDelete',
		'caption' => 'Borrar',
		'buttonType' => 'button',
        //'themeUrl' => Yii::app()->baseUrl . '/css/jui',
        //'theme' => 'redmond',
        //'cssFile' => array('jquery-ui.css'),
        'options' => array('icons' => 'js:{primary:"ui-icon-closethick"}'),
        'onclick' =>
        'js:function()
                {
                    var th=this;
                    var afterDelete=function(link,success,data){ if(success) $("#statusMsg").html(data); };
                    var selectionIds = $.fn.yiiGridView.getSelection("guias-grid");
                    if (selectionIds.length!==0) {
                        if(!confirm("Are you sure you want to delete selected items?")) return false;
                        $.fn.yiiGridView.update("guias-grid", {
                        type:"POST",
                        url:"' . $deleteUrl . '",
                        data: {ids: selectionIds},
                        dataType: "text",
                        success:function(data) {
                        	$.fn.yiiGridView.update("guias-grid");
                        	afterDelete(th,true,data);
                        },
                        error:function(XHR) {
                        	return afterDelete(th,false,XHR);
                        }
                        });
                    }
                    else
                    {
                        alert("nothing selected");
                    }
                    this.blur();
                    return false;
                }',
        )
);
*/

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=> 2,
	'columns'=>array(
		array(
		'class'=>'CCheckBoxColumn',
		'value'=>'$data->id',
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
