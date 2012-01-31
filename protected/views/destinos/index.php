<?php
$this->breadcrumbs=array(
	'Destinos',
);

$this->menu=array(
	array('label'=>'Create Destinos', 'url'=>array('create')),
	array('label'=>'Manage Destinos', 'url'=>array('admin')),
);
?>

<h1>Destinos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
