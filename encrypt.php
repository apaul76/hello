<?php


$conn=mysql_connect("localhost","root","");
$select=mysql_select_db("encrypt",$conn);
if($select==true)

{
	if(isset($_POST['submit']))
	{
		$var=$_POST['var'];
		$val=$_POST['val'];
	$query="insert into symmetric(id,var,i_val) values('','$var','$val')";
	$insert=mysql_query($query,$conn);
	echo "success";
}

}
?>
<html>
<style type="text/css">
	
table,td,th
{
	border:1px solid black;
}

</style>	
<body>
<form method="post">
<table>
<tr>
<th>CHARACTER</th>
<th>INTEGER VALUE</th>
<th></th>
</tr>
<tr>	
<td>CHARACTER:<input type="text" name="var"></td>
<td>INTEGER VALUE:<input type="number" name="val"></td>
<td>Submit<input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>
</body>


</html>