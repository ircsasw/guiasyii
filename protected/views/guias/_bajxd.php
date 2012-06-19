<BODY>
<CENTER>
<table border="0">	
	<tr bgcolor="#D8D8D8">
		<th><?php echo CHtml::activeLabel($model[0], 'folio')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_baja')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_destino')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'fecha_baja')?></th>
	</tr>	

<?php 
	$total = 0;
	foreach ($model as $value)
	{
		$total++;
		if($total % 2) {
			echo "<tr>";
		} else {
			echo '<tr bgcolor="#EFFBFB">';
		}
		echo "<td>". $value->folio."</td>"; 
		echo "<td>". $value->idUsuarioA->usuario."</td>";
		echo "<td>". $value->idDestino->destino."</td>";
		echo "<td>". $value->fecha_baja."</td></tr>"; 
	}
?>
</table>
</CENTER>
<p><?php echo "Total: $total"?>
</BODY>