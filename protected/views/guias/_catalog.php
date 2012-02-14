
<BODY>
 
<h1>Hola mundo!!</h1>
<table BORDER="1">
<tr>
<th scope="row",>ID</th>
<th scope="row",>SERIE</th>
</tr>	

<?php 
foreach ($model as $value)
{
	echo "<tr>
		<td>". $value->id."</td>"; 
		echo "<td>". $value->serie."</td>
	</tr>"; 
	//echo ''. $value->id;
}
?>
</table>