<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'origenes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'origen'); ?>
		<?php echo $form->textField($model,'origen',array('size'=>40,'maxlength'=>40, 'onChange'=>'conMayusculas(this)')); ?>
		<?php echo $form->error($model,'origen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'button grey')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">  
	// Al salir del campo convierte a mayusculas
	function conMayusculas(field) {  
		field.value = field.value.toUpperCase();
	}
</script>