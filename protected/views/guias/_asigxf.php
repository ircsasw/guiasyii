<BODY>
<CENTER>
<table BORDER=".5" align="center" WIDTH="80%" HEIGHT="80%" >
	<tr>
		<th><?php echo CHtml::activeLabel($model[0], 'folio')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'serie')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_asigna')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'id_origen')?></th>
		<th><?php echo CHtml::activeLabel($model[0], 'fecha_asig')?></th>
	</tr>	

	<?php 
	foreach ($model as $value)
	{
		echo "<tr> <td>". $value->folio."</td>"; 
		echo "<td>". $value->serie."</td>";
		echo "<td>". $value->idUsuarioA->usuario."</td>";
		echo "<td>". $value->id_origen."</td>";
		echo "<td>". $value->fecha_asig."</td></tr>"; 
	}
	?>
	
</table>
</CENTER>
</BODY>