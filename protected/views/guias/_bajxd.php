<BODY>
<CENTER>
<table border="0">
	<tr bgcolor="#D8D8D8">
		<th><?php echo CHtml::activeLabel($model[0], 'folio')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'zona')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'kilaje')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_baja')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_origen')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_destino')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'fecha_baja')?></th>
	</tr>

<?php
	$cBaja = "";
	$cOrigen = "";
	$cDestino = "";
	$total = 0;
	foreach ($model as $value)
	{
		$total++;
		if($total % 2) {
			echo "<tr>";
		} else {
			echo '<tr bgcolor="#EFFBFB">';
		}
		echo "<td>".$value->folio."</td>";
		echo "<td>".$value->zona."</td>";
		echo "<td>".$value->kilaje."</td>";
		if ($cBaja != $value->idUsuarioB->usuario)
		{
			$cBaja = $value->idUsuarioB->usuario;
			echo "<td>".$value->idUsuarioB->usuario."</td>";
		}
		else
			echo "<td>&nbsp;</td>";
		if ($cOrigen != $value->idOrigen->origen)
		{
			$cOrigen = $value->idOrigen->origen;
			echo "<td>".$value->idOrigen->origen."</td>";
		}
		else
			echo "<td>&nbsp;</td>";
		if ($cDestino != $value->idDestino->destino)
		{
			$cDestino = $value->idDestino->destino;
			echo "<td>".$value->idDestino->destino."</td>";
		}
		else
			echo "<td>&nbsp;</td>";
		echo "<td>".$value->fecha_baja."</td></tr>";
	}
?>
</table>
</CENTER>
<p><?php echo "Total: $total"?>
</BODY>