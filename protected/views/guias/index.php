<?php
$this->breadcrumbs=array(
	'Guias',
);

$this->menu=array(
	array('label'=>'Create Guias', 'url'=>array('create')),
	array('label'=>'Manage Guias', 'url'=>array('admin')),
);
?>

<h1>Guias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
