<?php
$this->breadcrumbs=array(
	'Origenes',
);

$this->menu=array(
	array('label'=>'Create Origenes', 'url'=>array('create')),
	array('label'=>'Manage Origenes', 'url'=>array('admin')),
);?>

<h1>Origenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
