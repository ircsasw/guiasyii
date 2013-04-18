<?php
$this->breadcrumbs=array(
	'Origenes',
);

$this->menu=array(
	array('label'=>'Crear Origen', 'url'=>array('create')),
	array('label'=>'Administrar Origenes', 'url'=>array('admin')),
);?>

<h1>Origenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
