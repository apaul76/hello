
<html>
<head>
<style type="text/css">
	
table,td,th
{
	border:1px solid black;
}

</style>	

</head> 

<body>
	
<table>
	
	<tr>
	<th>CHARACTER</th>
	<th>INTEGER</th>
<th>ENCRYPTED CHARACTER</th>
<th>INTEGERVALUE</th>
</tr>



<?php

$value=$_GET['val'];
$char=$_GET['var'];


$conn=mysql_connect("localhost","root","");
$select=mysql_select_db("encrypt",$conn);
if($select==true)

{

$val=($value+15)%26;

$query="select var,i_val from symmetric where i_val='$val'";

$p=mysql_query($query,$conn);

while($row=mysql_fetch_array($p))

{
	$var=$row['var'];
	$val=$row['i_val'];



?>


<tr>
<td><?php echo $char;?></td>
<td><?php echo $value;?></td>
<td><?php echo $var;?></td>
<td><?php echo $val;?></td>
</tr>



	<?php
}



}



?>


</body>

</html>