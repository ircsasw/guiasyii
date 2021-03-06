<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('size'=>10,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'zona'); ?>
		<?php echo $form->textField($model,'zona',array('size'=>10,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_asig'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>'$model',
				'name'=>'Guias[fecha_asig]',
				'language'=>Yii::t('default', 'en'),
				'options'=>array(
					'showAnim'=>'fold', 
					// 'focus', 'button', 'both'
					//'showOn'=>'button',
					//'buttonText'=>Yii::t('default','Selecciona una fecha'),
					'dateFormat'=>'yy-mm-dd',
					'showButtonPanel'=>true,
					'changeYear'=>true,
					'changeYear'=>true,
				),
				'htmlOptions'=>array(
					//'size'=>10,
					'style'=>'width:90px'
					),
				)		
			);
		?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_origen')?>
		<?php 
			$datos = CHtml::listData(Origenes::model()->findAll(),'id','origen');
			echo CHtml::activeDropDownList($model, 'id_origen', $datos, array('prompt'=>'Seleccionar'));
		?>

	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_asigna')?>
		<?php 
			$datos = CHtml::listData(Usuarios::model()->findAll(),'id','usuario');
			echo CHtml::activeDropDownList($model, 'id_asigna', $datos, array('prompt'=>'Seleccionar'));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_baja'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>'$model',
					'name'=>'Guias[fecha_baja]',
					'language'=>Yii::t('default', 'en'),
					'options'=>array(
						'showAnim'=>'fold',
						// 'focus', 'button', 'both'
						//'showOn'=>'button',
						//'buttonText'=>Yii::t('default','Selecciona una fecha'),
						'dateFormat'=>'yy-mm-dd',
						'showButtonPanel'=>true,
						'changeYear'=>true,
						'changeYear'=>true,
					),
					'htmlOptions'=>array(
						//'size'=>10,
						'style'=>'width:90px'
					),
				)		
			);
		?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_destino')?>
		<?php 
			$datos = CHtml::listData(Destinos::model()->findAll(),'id','destino');
			echo CHtml::activeDropDownList($model, 'id_destino', $datos, array('prompt'=>'Seleccionar'));
		?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_baja')?>
		<?php 
			$datos = CHtml::listData(Usuarios::model()->findAll(),'id','usuario');
			echo CHtml::activeDropDownList($model, 'id_baja', $datos, array('prompt'=>'Seleccionar'));
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'button grey')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->