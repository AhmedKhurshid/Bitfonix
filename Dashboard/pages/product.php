<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Product</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="addproduct.php">Add Product</a>
              </div>
              <div class="col-md-12">
                <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                  if($_SESSION["user_role"] == '1'){
                    /* select query of post table for admin user */                   
                    $sql = "SELECT product.p_id, product.p_name, product.p_description, product.p_item_code, product.p_image, product.p_price,
                    category.c_Name, product.c_id 
                    FROM product
                    LEFT JOIN category
                    ON product.c_id = category.c_id
                    LEFT JOIN admin ON product.author = admin.user_id
                    ORDER BY product.p_id DESC LIMIT {$offset},{$limit}";
                    
                    
                  }elseif($_SESSION["user_role"] == '0'){
                    $sql = "SELECT product.p_id, product.p_name, product.p_description, product.p_item_code, product.p_image, product.p_price,
                    category.c_Name, product.c_id 
                    FROM product
                    LEFT JOIN category
                    ON product.c_id = category.c_id
                    LEFT JOIN admin ON product.author = admin.user_id
                    WHERE product.author = {$_SESSION['user_id']}
                    ORDER BY product.p_id DESC LIMIT {$offset},{$limit}";
                    
                  }

                  $result = mysqli_query($conn, $sql) or die("Query Fail.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Product Name</th>
                          <th>Item Code</th>
                          <th>Product Image</th>
                          <th>Product Description</th>
                          <th>Product Price</th>
                          <th>Category</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['p_name']; ?></td>
                              <td><?php echo $row['p_item_code']; ?></td>
                              <td><?php echo $row['p_image']; ?></td>
                              <td><?php echo $row['p_description']; ?></td>
                              <td><?php echo $row['p_price']; ?></td>
                              <td><?php echo $row['c_id']; ?></td>
                              <td class='edit'><a href='updateproduct.php?id=<?php echo $row['p_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='deleteproduct.php?id=<?php echo $row['p_id']; ?>&catid=<?php echo $row['c_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                if($_SESSION["user_role"] == '1'){
                  /* select query of post table for admin user */
                  $sql1 = "SELECT * FROM product";
                }elseif($_SESSION["user_role"] == '0'){
                  /* select query of post table for normal user */
                  $sql1 = "SELECT * FROM product
                  WHERE author = {$_SESSION['user_id']}";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="product.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="product.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="product.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
