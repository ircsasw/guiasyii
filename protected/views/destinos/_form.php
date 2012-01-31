<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'destinos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'destino'); ?>
		<?php echo $form->textField($model,'destino',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'destino'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->