<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
  <?php
    if( isset($_POST['save']) ){
        // database configuration
        include 'config.php';
        $category =mysqli_real_escape_string($conn, $_POST['cat']);
        /* query for check input value exists in category table or not*/
        $sql = "SELECT c_Name FROM category where c_Name='{$category}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)> 0) {
            // if input value exists
            echo "<p style = 'color:red;text-align:center;margin: 10px 0';> Category already exists.</p>";
        }else{
            // if input value not exists
             /* query for insert record in category name */
            $sql = "INSERT INTO category (c_Name)
                    VALUES ('{$category}')";

            if (mysqli_query($conn, $sql)){
                header("location: {$hostname}/pages/category.php");
            }else{
              echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
            }
        }
    }
    mysqli_close($conn);

    include "footer.php";
  ?>
