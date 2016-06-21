

<html>
<style type="text/css">
	
table,td,th
{
	border:1px solid black;
}

</style>	
<body>
<form method="post" >
<table>
<tr>
<th>CHARACTER</th>
<th></th>
</tr>
<tr>	
<td>CHARACTER:<input type="text" name="var"></td>
<td>Submit<input type="submit" value="submit" name="submit"></td>
</tr>
</table>
<br>
<br>
<table>
	
<tr>
<th>CHARACTER</th>
<th>INTEGER VALUE</th>
<th>ENCRYPTION</th>
</tr>
<tr>	

<?php

 $conn=mysql_connect("localhost","root","");
$select=mysql_select_db("encrypt",$conn);
if($select==true)

{
	if(isset($_POST['submit']))
	{
		$var=$_POST['var'];
		$query="select var,i_val from symmetric where var='$var'";
		$p=mysql_query($query,$conn);
		while($row=mysql_fetch_array($p))
		
		{

			$var=$row['var'];
			$val=$row['i_val'];


?>

<td><?php echo $var;?></td>
<td><?php echo $val;?></td>
<td><a href="http://localhost/chatoo/Temp_chat/symmetric.php?val=<?php echo $val;?> & var=<?php echo $var;?>">encrypt</td>
<?php



		}

	}

}

?>

</table>
</form>
</body>


</html>