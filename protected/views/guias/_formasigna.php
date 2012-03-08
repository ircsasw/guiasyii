<div class="wide form">

<?php echo CHtml::form(CHtml::normalizeUrl(''), 'post'); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<label>Serie:</label> 
		<?php echo CHtml::textField('serie','',array('size'=>12,'maxlength'=>10,)) ?>
	</div>

	<div class="row">
		<label>Del Folio:</label> 
		<?php echo CHtml::textField('folio_ini','',array('size'=>12,'maxlength'=>10,)) ?>
		<b style="margin-right: 10px; text-aling: right; width: 100px; font-size: 0.9em; font-weight: bold; border: 0 none; padding: 0; vertical-align: baseline;">Al:</b>
		<?php echo CHtml::textField('folio_fin','',array('size'=>12,'maxlength'=>10,)); ?>
	</div>

	<div class="row">
		<label>Asignado El:</label> 
		<?php echo CHtml::textField('fecha_asig',date("Y-m-d"),array('size'=>12,'maxlength'=>10,)) ?>
	</div>
	
	<div class="row">
		<label>Origen:</label> 
		<?php 
 			$datos = CHtml::listData(Origenes::model()->findAll(),'id','origen');
 			echo  CHtml::activeDropDownList(Origenes::model(),'id',$datos,array('empty'=>'---Selecione Origen---')); 
 		?>
		<?php //echo CHtml::textField('id_origen','',array('size'=>12,'maxlength'=>10,)); ?>
		<?php //echo CHtml::textField('id_asigna','',array('size'=>12,'maxlength'=>10,)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Asignar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->