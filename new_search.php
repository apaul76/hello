<?php

if(isset ($_POST['submit']))

{
	if(preg_match("/[A-Z | a-z]+/",$_POST['search']))

	{
		$name=$_POST['search'];
        $query="select id, name,address,location from search where name like '%".$name."%' or address like '%".$name."%' or location like '%".$name."%' ";
        $search_result= filterTable($query);

	}

	if($_POST['search']==null)
	{

		$query="select id, name,address,location from search ";
        $search_result= filterTable($query);
		
	}

}
else
{
	 	$query="select id, name,address,location from search ";
        $search_result= filterTable($query);

}

function filterTable($query)

{

	$conn=mysql_connect("localhost","root","");
    $p=mysql_select_db("filter",$conn);
    $filter_result=mysql_query($query,$conn);
    return $filter_result;
}
?>

<html>
	
<head>
	
	<style type="text/css">

	table,td,th
	{
		border: 1px solid black;
	}


	</style>
</head>


<body>
<form action="http://localhost/collegeprojectfinal/new_search.php" method="post">
<table>	
<tr>
<td>SEARCH:<input type="text" name="search"></td>
<td>SUBMIT:<input type="submit" name="submit" value="submit"></td>
</tr>
<tr>
<th>USER_ID</th>
<th>NAME</th>
<th>ADDRESS</th>
<th>LOCATION</th>
</tr>

<?php
  while ($row=mysql_fetch_array($search_result)) 
 
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
</tr>


<?php


}
?>
</table>
</form>
</body>
</html>