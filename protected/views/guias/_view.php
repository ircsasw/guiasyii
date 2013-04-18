<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('factura')); ?>:</b>
	<?php echo CHtml::encode($data->factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->folio), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('zona')); ?>:</b>
	<?php echo CHtml::encode($data->zona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_asig')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_asig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_origen')); ?>:</b>
	<?php echo CHtml::encode($data->id_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_asigna')); ?>:</b>
	<?php echo CHtml::encode($data->id_asigna); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_baja')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_baja); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_destino')); ?>:</b>
	<?php echo CHtml::encode($data->id_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_baja')); ?>:</b>
	<?php echo CHtml::encode($data->id_baja); ?>
	<br />

	*/ ?>

</div>