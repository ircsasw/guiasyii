<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('size'=>10,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'zona'); ?>
		<?php echo $form->textField($model,'zona'); ?>
		<?php echo $form->error($model,'zona'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_asig'); ?>
		<?php echo $form->textField($model,'fecha_asig'); ?>
		<?php echo $form->error($model,'fecha_asig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_origen'); ?>
		<?php echo $form->textField($model,'id_origen'); ?>
		<?php echo $form->error($model,'id_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_asigna'); ?>
		<?php echo $form->textField($model,'id_asigna'); ?>
		<?php echo $form->error($model,'id_asigna'); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_baja'); ?>
		<?php echo $form->textField($model,'fecha_baja'); ?>
		<?php echo $form->error($model,'fecha_baja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_destino'); ?>
		<?php echo $form->textField($model,'id_destino'); ?>
		<?php echo $form->error($model,'id_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_baja'); ?>
		<?php echo $form->textField($model,'id_baja'); ?>
		<?php echo $form->error($model,'id_baja'); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->