<?php include "header.php";

if($_SESSION["user_role"] == 0){
  include "config.php";
  $pId = $_GET['id'];
  $sql2 = "SELECT author FROM product WHERE p_id = {$pId}";
  $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");

  $row2 = mysqli_fetch_assoc($result2);

  if($row2['author'] != $_SESSION["user_id"]){
    header("location: {$hostname}/pages/product.php");
  }

}
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Product</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
      <?php
        include "config.php";

        $pId = $_GET['id'];
        $sql = "SELECT product.p_id, product.p_name, product.p_description, product.p_item_code, product.p_image, product.p_price,
        category.c_Name, product.c_id 
        FROM product
        LEFT JOIN category
        ON product.c_id = category.c_id
        LEFT JOIN admin ON product.author = admin.user_id
        WHERE product.p_id = {$pId}";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>
        <!-- Form for show edit-->
        <form action="saveupdateproduct.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="pId"  class="form-control" value="<?php echo $row['p_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="pName">Product Name</label>
                <input type="text" name="pName"  class="form-control" id="exampleInputUsername" value="<?php echo $row['p_name']; ?>">
            </div>
            <div class="form-group">
                <label for="pItem">Item Code</label>
                <input type="text" name="pItem"  class="form-control" id="exampleInputUsername" value="<?php echo $row['p_item_code']; ?>">
            </div>
            <div class="form-group">
                <label for="pDesc">Product Description</label>
                <textarea name="pDesc" class="form-control"  required rows="5">
                    <?php echo $row['p_description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="pPrice">Product Price</label>
                <input type="text" name="pPrice"  class="form-control" id="exampleInputUsername" value="<?php echo $row['p_name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">  Category</label>
                <select class="form-control" name="category">
                  <option disabled> Select Category</option>
                  <?php
                    include "config.php";
                    $sql1 = "SELECT * FROM category";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                      while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['category'] == $row1['c_id']){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }
                        echo "<option {$selected} value='{$row1['c_id']}'>{$row1['c_Name']}</option>";
                      }
                    }
                  ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $row['c_id']; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['p_image']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['p_image']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
