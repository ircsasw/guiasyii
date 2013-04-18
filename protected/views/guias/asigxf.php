<?php 
$this->pageTitle='Reportes';

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Reportes',
);

$this->menu=array(
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Asignaciones de guias del periodo</h1>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>

<div class="wide form">

<?php echo CHtml::form(CHtml::normalizeUrl(''), 'post'); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'fecha_ini')?>
		<?php echo CHtml::activeTextField($model, 'fecha_ini', array('size'=>12,'maxlength'=>10)) ?> 
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'fecha_fin')?> 
		<?php echo CHtml::activeTextField($model, 'fecha_fin', array('size'=>12,'maxlength'=>10))?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Aceptar',array('class'=>'button grey')); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php /*
, array('style'=>'margin-right: 10px; text-aling: right; width: 100px; font-size: 0.9em; font-weight: bold; border: 0 none; padding: 0; vertical-align: baseline; float: none; display: inline;')
*/
?>