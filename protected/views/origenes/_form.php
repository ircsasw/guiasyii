<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'origenes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'origen'); ?>
		<?php echo $form->textField($model,'origen',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'origen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->