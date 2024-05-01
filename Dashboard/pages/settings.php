<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Edit Profile</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                  include "config.php";

                  $sql = "SELECT * FROM admin";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <!-- Form -->
                  <form  action="savesettings.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="website_name">Admin First Name</label>
                          <input type="text" name="website_name" value="<?php echo $row['first_name']; ?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="website_name">Admin First Name</label>
                          <input type="text" name="website_name1" value="<?php echo $row['last_name']; ?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="footer_desc">UserName</label>
                          <textarea name="footer_desc" class="form-control" rows="5" required><?php echo $row['username']; ?></textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php
                      }
                    }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
