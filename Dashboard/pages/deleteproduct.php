<?php
  include "config.php";

  $pId = $_GET['id'];
  $cat_id = $_GET['catid'];

  $sql1 = "SELECT * FROM product WHERE p_id = {$pId}";
  $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['p_image']);

  $sql = "DELETE FROM product WHERE p_id = {$pId};";
  $sql .= "UPDATE category SET product= product - 1 WHERE c_id = {$cat_id}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/pages/product.php");
  }else{
    echo "Query Failed";
  }
?>
