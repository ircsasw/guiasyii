
<BODY>
<CENTER>
<table BORDER="1" align="center" WIDTH="200px" HEIGHT="100px" >
<tr>
<th>ID</th>
<th>SERIE</th>
<th>Guias</th>
</tr>	

<?php 
foreach ($model as $value)
{
	echo "<tr> <td>". $value->id."</td>"; 
	echo "<td>". $value->serie."</td>";
	echo "<td>". $value->serie."</td></tr>"; 
	//echo ''. $value->id;
}
?>
</table>
</CENTER>
</BODY>