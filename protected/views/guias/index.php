<?php
$this->breadcrumbs=array(
	'Guias',
);

$this->menu=array(
	array('label'=>'Crear Guias', 'url'=>array('asigna')),
	array('label'=>'Administrar Guias', 'url'=>array('admin')),
);
?>

<h1>Guias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
