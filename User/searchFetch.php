<?php
	include('connect.php');
	if(isset($_POST['q'])){
	$searchtext=$_POST['q'];
	$q="SELECT  search.s_id, product.p_name
	FROM search
	INNER JOIN product ON search.p_id=product.p_id where p_name LIKE '%$searchtext%'";
	$rows=mysqli_query($con,$q);
	}
	else{
	$q="select * from search";
	$rows=mysqli_query($con,$q);
	}
	?>
	
	<?php
	while($data=mysqli_fetch_assoc($rows)){
echo "<tr>
<td>".$data['Id']."</td>
<td>".$data['st_Name']."</td>
<td>".$data['st_Course']."</td>
<td>".$data['st_Fees']."</td>
</tr>";
}
?>