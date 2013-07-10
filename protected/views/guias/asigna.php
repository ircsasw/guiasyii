<?php
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Crear',
);
//'ejecutar'=>'{inactivarChkd();}', 'url'=>'#', 'titulo'=>Yii::t('default', 'Inactivate'), 'clase'=>''),
$this->menu=array(
	array('label'=>'Lista Guias', 'url'=>array('index')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
	array('label'=>'Eliminar seleccionadas', 'linkOptions'=>array('onclick'=>'{borrarChkd();}'), 'url'=>'#'),
);
?>

<h1>Asignar Guias</h1>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>

<?php echo $this->renderPartial('_formasigna', array('modelasigna'=>$modelasigna)); ?>

<?php /*echo CHtml::button(
	'Borrar',
	array(
		'submit' => array('controller/action'),
		'class' => 'button grey'
		)
	);*/
?>

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
		array(
			'name'=>'kilaje',
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
			'value'=>'$data->id_destino > 0 ? $data->idDestino->destino : ""',
		),
		array(
			'name'=>'baja_search',
			'value'=>'$data->id_baja > 0 ? $data->idUsuarioB->usuario : ""',
		),
		/*
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
));
?>


<script type="text/javascript">
	idsel = [];
	idchk = [];

	// actualiza el grid
	function refreshGrid()
	{
		$.fn.yiiGridView.update('guias-grid');
	}

	// se ejecuta cada que el usuario hace click en una fila del grid
	function userClicks(target_id)
	{
	    alert($.fn.yiiGridView.getSelection(target_id));
	}

	// muestra las filas seleccionadas
	function muestraSelec()
	{
		idsel = $.fn.yiiGridView.getSelection('guias-grid');
		alert(idsel);
		//alert("ok");
		return;
	}

	// muestra las filas checadas
	function muestraChkd()
	{
		idchk = $.fn.yiiGridView.getChecked('guias-grid', 'chk');
		alert(idchk);
		return;
	}

	/**
	*
	**/
	function borrarChkd()
	{
		idchk = $.fn.yiiGridView.getChecked('guias-grid', 'chk');
		//alert(idchk);
		if (idchk.length != 0)
		{
			var confirmar = confirm("Borrar las guias seleccionadas?");
			if (confirmar)
			{
				for (x=idchk.length; x>=1; x=x-1)
				{
			    	jQuery.ajax(
			    		{
			    			'url':'<?php echo $this->createUrl('guias/delete'); ?>' + '&id=' + idchk[x-1],
			    			'data':$(this).serialize(),
			    			'type':'post',
			    			'dataType':'json',
			    			'success':function(data)
						        {
									if (data.status == 'failure')
									{
										//alert(data.respuesta);
										$.fn.yiiGridView.update('guias-grid');
									}
									else
									{
										$.fn.yiiGridView.update('guias-grid');
										//alert(data.respuesta);
									}
								}
							,'cache':false
						}
					);;
				}
			}
			else
			{
				//alert("Operación cancelada");
			}
			return false;
		}
		else
			var messg = "Debe seleccionar una guia";
			alert(messg);
			return;
	}

</script>
