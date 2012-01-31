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
		<?php echo $form->label($model,'id_origen'); ?>
		<?php echo $form->textField($model,'id_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_asigna'); ?>
		<?php echo $form->textField($model,'id_asigna'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_baja'); ?>
		<?php echo $form->textField($model,'fecha_baja'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_destino'); ?>
		<?php echo $form->textField($model,'id_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_baja'); ?>
		<?php echo $form->textField($model,'id_baja'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->