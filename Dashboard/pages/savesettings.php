<?php
include "config.php";

// if(empty($_FILES['logo']['name'])){
//   $file_name = $_POST['old_logo'];
// }else{
//   $errors = array();

//   $file_name = $_FILES['logo']['name'];
//   $file_size = $_FILES['logo']['size'];
//   $file_tmp = $_FILES['logo']['tmp_name'];
//   $file_type = $_FILES['logo']['type'];
//   $exp = explode('.',$file_name);
//  $file_ext = end($exp);

//   $extensions = array("jpeg","jpg","png");

//   if(in_array($file_ext,$extensions) === false)
//   {
//     $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
//   }

//   if($file_size > 2097152){
//     $errors[] = "File size must be 2mb or lower.";
//   }

//   if(empty($errors) == true){
//     move_uploaded_file($file_tmp,"images/".$file_name);
//   }else{
//     print_r($errors);
//     die();
//   }
// }    

//logo='{$file_name}'

$sql = "UPDATE admin SET first_name='{$_POST["website_name"]}',last_name='{$_POST["website_name1"]}',username='{$_POST["footer_desc"]}'";

$result = mysqli_query($conn,$sql);

if($result){
  header("location: {$hostname}/pages/settings.php");
}else{
  echo "Query Failed";
}

?>
