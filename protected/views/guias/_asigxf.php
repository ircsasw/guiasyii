<BODY>
<CENTER>
<table BORDER=".5" align="center" WIDTH="80%" HEIGHT="80%" >
<tr>
<th>Folio</th>
<th>SERIE</th>
<th>id_asigna</th>
<th>id_origen</th>
<th>Fecha Asignación</th>

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