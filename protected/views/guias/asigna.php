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
<!-- 
funcion eliminar en SPS
<script type="text/javascript">
	idsel = [];
	idchk = [];
	function Eliminar()
	{
		idchk = $.fn.yiiGridView.getChecked('guias-grid', 'chk');
		//alert(idchk);
		if (idchk.length != 0)
		{
			var confirmar = confirm("<?php //echo Yii::t('default', 'Inactivate the items marked').'?'; ?>");
			if (confirmar)
			{
				for (x=idchk.length; x>=1; x=x-1) 
				{	 
			    	jQuery.ajax({'url':'<?php// echo $this->createUrl('delete'); ?>' + '&id=' + idchk[x-1],'data':$(this).serialize(),'type':'post','dataType':'json','success':function(data)
			        {
						if (data.status == 'failure')
						{
							alert(data.respuesta);
						}
						else
						{
							$.fn.yiiGridView.update('guias-grid');
							//alert(data.respuesta);
						}
					} ,'cache':false});;
				}
			}
			else
			{
				alert("<?php //echo Yii::t('default', 'Operation Cancelled').'.'; ?>");
			}
			return false;
		}
		else 
			var messg = "<?php //echo Yii::t('default', 'Must select a row.'); ?>";
			alert(messg);
			return;
	}
</script>
 -->




