<html>
<head>


<style>
table,td,th
{
 border:1px solid black;
}
.color{
 color:red;
}
</style>

</head>
<body>

<form method="post" action="">
<table>

<tr>
<td>NAME:<input type="text" name="name" placeholder="enter name..."></td>
<td>ADDRESS:<input type="text" name="address" placeholder="enter address..."></td>
<td>LOCATION:<input type="text" name="location" placeholder="enter location..."></td>
<td>SUBMIT:<input type="submit" name="submit" value="submit"></td>
</tr>
<?php
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("filter",$conn);
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$add=$_POST['address'];
$loc=$_POST['location'];
$p="insert into search (id,name,address,location) values('','$name','$add','$loc')";
$q=mysql_query($p,$conn);
if($q==true)
{
echo "success";
}
}
?>
</table>
<br>
<table>
<tr>
<td>SEARCH:<input type="text" name="search" placeholder="enter item to be search..."></td>
<td>SUBMIT:<input type="submit" name="submitt" value="submit"></td>
</tr>
<tr>
<th>USER_ID</th>
<th>USER_NAME</th>
<th>USER_ADDRESS</th>
<th>USER_LOCATION</th>
<th>DELETE</th>
</tr>

<?php
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("filter",$conn);

if(isset($_POST['submitt']))

{
	if(preg_match("/[A-Z | a-z]+/",$_POST['search']))
	{
		$name=$_POST['search'];
		$p="select id,name,address,location from search where name like '%".$name."%' or address like'%".$name."%' or location like '%".$name."%'   ";
		$q=mysql_query($p,$conn);
		while($row=mysql_fetch_array($q))

			{
				 $id=$row['id'];
				 $name=$row['name'];
                                 $add=$row['address'];
				 $loc=$row['location'];

?>

<tr>
<td><div class="color"><?php echo $id;?></div></td>
<td><div class="color"><?php echo $name;?></div></td>
<td><div class="color"><?php echo $add;?></div></td>
<td><div class="color"><?php echo $loc;?></div></td>
<td><a href="search_del.php?id=<?php echo $id;?>">delete</a></td>
</tr>




<?php
			
		}

	}
}
?>

<?php
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("filter",$conn);
$p="select id,name,address,location from search";
$q=mysql_query($p,$conn);
if($q==true)

{
while($row=mysql_fetch_array($q))

{
 $id=$row['id'];
$name=$row['name'];
$add=$row['address'];
$loc=$row['location'];
?>

<tr>
<td><?php echo $id;?></td>
<td><?php echo $name;?></td>
<td><?php echo $add;?></td>
<td><?php echo $loc;?></td>
<td><a href="search_del.php?id=<?php echo $id;?>">delete</a></td>
</tr>


<?php	
}

}


?>
</table>
</form>
</body>
</html>