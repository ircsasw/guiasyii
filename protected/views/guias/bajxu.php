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

<h1>Bajas de guias por usuario</h1>

<div class="wide form">

<?php echo CHtml::form(CHtml::normalizeUrl(''), 'post'); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($model, 'id_baja')?>
		<?php 
			$datos = CHtml::listData(Usuarios::model()->findAll(),'id','usuario');
			echo CHtml::activeDropDownList($model, 'id_baja', $datos, array('prompt'=>'Seleccionar'));
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