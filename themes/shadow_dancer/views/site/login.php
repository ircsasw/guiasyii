<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Acceso',
);
?>

<h1>Acceso</h1>

<p>Por favor llene el siguiente formulario con sus datos de acceso:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> sin requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario'); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass'); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Entrar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
