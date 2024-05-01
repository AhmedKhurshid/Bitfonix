<?php
  include "config.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();
  $Name = mysqli_real_escape_string($conn, $_POST['pName']?? "");
  $description = mysqli_real_escape_string($conn, $_POST['pDesc']?? "");
  $category = mysqli_real_escape_string($conn, $_POST['category']?? "");
  $item = mysqli_real_escape_string($conn, $_POST['pItem']?? "");
  $price = mysqli_real_escape_string($conn, $_POST['pPrice']?? "");
  $img = mysqli_real_escape_string($conn, $_POST['fileToUpload']?? "");
  //$author = $_SESSION['user_id'];

  $sql = "INSERT INTO `product`(`p_name`, `p_item_code`, `p_image`, `p_description`, `p_price`, `c_id`) VALUES ('$Name','$item','$new_name','$description','$price','$category');";
  $sql .= "UPDATE category SET post = post + 1 WHERE c_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/pages/product.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
