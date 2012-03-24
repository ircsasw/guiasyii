<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_asig'); ?>
		<?php echo $form->textField($model,'fecha_asig'); ?>
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
		<?php echo $form->textField($model,'fecha_baja'); ?>
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
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->