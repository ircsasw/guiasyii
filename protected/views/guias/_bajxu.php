<BODY>
<CENTER>
<table BORDER=".5" align="center" WIDTH="80%" HEIGHT="80%" >
<tr>
		<th><?php echo CHtml::activeLabel($model[0], 'folio')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_baja')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_destino')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'fecha_baja')?></th>
	</tr>	


<?php 
foreach ($model as $value)
{
	echo "<tr> <td>". $value->folio."</td>"; 
	echo "<td>".$value->idUsuarioA->usuario."</td>";
	echo "<td>". $value->idDestino->destino."</td>";
	echo "<td>". $value->fecha_baja."</td></tr>"; 
}
?>
</table>
</CENTER>
</BODY>