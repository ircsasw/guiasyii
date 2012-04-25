<div class="wide form">

<?php echo CHtml::form(CHtml::normalizeUrl(''), 'post'); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo CHtml::errorSummary($modelasigna); ?>

	<div class="row">
		<?php echo CHtml::activeLabel($modelasigna,'serie'); ?>
		<?php echo CHtml::activeTextField($modelasigna, 'serie', array('size'=>12,'maxlength'=>10)) ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($modelasigna, 'folio_ini')?>
		<?php echo CHtml::activeTextField($modelasigna, 'folio_ini', array('size'=>12,'maxlength'=>10)) ?> 
		<?php echo CHtml::activeLabel($modelasigna, 'folio_fin', array('style'=>'margin-right: 10px; text-aling: right; width: 100px; font-size: 0.9em; font-weight: bold; border: 0 none; padding: 0; vertical-align: baseline; float: none; display: inline;'))?>
		<?php echo CHtml::activeTextField($modelasigna, 'folio_fin', array('size'=>12,'maxlength'=>10))?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($modelasigna, 'fecha_asig')?> 
		<?php 
			//echo CHtml::activeTextField($modelasigna, 'fecha_asig', array('size'=>12,'maxlength'=>10))
			$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>'$model',
					'name'=>'AsignaForm[fecha_asig]',
					//'language'=>Yii::t('default', 'en'),
					//'value'=>$model->fecha_alta,
					'value'=>Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($model->fecha_asig, 'yyyy-MM-dd'),'medium',null),
					'htmlOptions'=>array(
						//'size'=>10, 
						'style'=>'width:80px;vertical-align:top'
					),
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('default','Select from calendar'), 
						'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png', 
						'buttonImageOnly'=>true,
						'dateFormat'=>'dd/mm/yy',
						'showButtonPanel'=>true,
						'changeYear'=>true,
						'changeYear'=>true,
					),
				)
			);
		?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabel($modelasigna, 'id_origen')?> 
		<?php 
 			$datos = CHtml::listData(Origenes::model()->findAll(),'id','origen');
 			//echo  CHtml::activeDropDownList(Origenes::model(),'id',$datos,array('empty'=>'---Selecione Origen---'));
 			echo CHtml::activeDropDownList($modelasigna, 'id_origen', $datos, array('prompt'=>'Seleccionar')); 
 		?>
		<?php //echo CHtml::textField('id_origen','',array('size'=>12,'maxlength'=>10,)); ?>
		<?php //echo CHtml::textField('id_asigna','',array('size'=>12,'maxlength'=>10,)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Asignar',array('class'=>'button grey')); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<script type="text/javascript">  
	// Al salir del campo convierte a mayusculas
	function conMayusculas(field) {  
		field.value = field.value.toUpperCase();
	}
</script>