<BODY>
<CENTER>
<table BORDER=".5" align="center" WIDTH="80%" HEIGHT="80%" >
<tr>
<th>Folio</th>
<th>id_baja</th>
<th>id_destino</th>
<th>Fecha Baja</th>

</tr>	

<?php 
foreach ($model as $value)
{
	echo "<tr> <td>". $value->folio."</td>"; 
	echo "<td>".$value->idUsuarioA->usuario."</td>";
	echo "<td>". $value->id_destino."</td>";
	echo "<td>". $value->fecha_baja."</td></tr>"; 
}
?>
</table>
</CENTER>
</BODY>