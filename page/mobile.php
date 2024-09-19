<?php
include('includes/navbar.php');
?>
  <div style="background-color:#F5FCF6">
          <?php
                       $row = "SELECT * FROM mobile WHERE id='78'";
                       $row_run = mysqli_query($con, $row);
                       
                       if(mysqli_num_rows($row_run) > 0){
                          foreach($row_run as $row){
                              $files=$row['image'];
                              $file=(explode(",",$files));
                              print_r($file);
                             ?>
                            <div>
                                <?php
                                foreach($file as $image) {
                                    
                                    ?>
                                    <img src=" ../admin/upload/category/mobile/image/<?= $image; ?>" alt="">


                            <?php
                          }
                            ?>
                            </div>



                          <?php
                          }
                        }
                        ?>

  </div>

  <?php 





if(isset($_GET['title'])){
    $id = mysqli_real_escape_string($con, $_GET['title']);
    $category = "SELECT * FROM category WHERE id='$id' LIMIT 1";
    $category_run = mysqli_query($con, $category);
    if(mysqli_num_rows($category_run) > 0){
      $categoryItem = mysqli_fetch_array($category_run);
      $page_title = $categoryItem[ 'name'];
      echo '$page_title';
?>
<input type="text">


<?php
    }
  }
    ?>
</body>
</html>


  <?php
include('includes/footer.php');
?>