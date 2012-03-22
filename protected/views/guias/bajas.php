<?php 
$this->pageTitle='Bajas';
/*
$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Reportes',
);
*/
$this->menu=array(
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Bajas</h1>

<div class="wide form">

<?php echo CHtml::form(CHtml::normalizeUrl(''), 'post'); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo CHtml::errorSummary($model); ?>
	
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'fecha')?>
		<?php echo CHtml::activeTextField($model, 'fecha', array('size'=>12,'maxlength'=>10)) ?> 
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'folio')?> 
		<?php echo CHtml::activeTextField($model, 'folio', array('size'=>12,'maxlength'=>10))?>
	</div>
	
		<div class="row">
		<?php echo CHtml::activeLabel($model, 'serie')?>
		<?php echo CHtml::activeTextField($model, 'serie', array('size'=>12,'maxlength'=>10)) ?> 
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_destino')?>
		<?php 
			$datos = CHtml::listData(Destinos::model()->findAll(),'id','destino');
			echo CHtml::activeDropDownList($model, 'id_destino', $datos, array('prompt'=>'Seleccionar'));
		?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Aceptar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php /*
, array('style'=>'margin-right: 10px; text-aling: right; width: 100px; font-size: 0.9em; font-weight: bold; border: 0 none; padding: 0; vertical-align: baseline; float: none; display: inline;')
*/
?>