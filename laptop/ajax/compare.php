<?php
session_start();
include('../includes/config.php');
//comment.php

if(isset($_POST["compare"])){
  $id = $_POST["id"];
  $query = "SELECT * FROM laptop WHERE id='$id'";
  $query_run = mysqli_query($con, $query);
  if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $row){
      }
    }
  if(isset($_SESSION['laptop_compare'])){
      if(count($_SESSION['laptop_compare'])!=3){

         if (in_array($_POST["id"], $_SESSION['laptop_compare'], TRUE)){
          ?>
             <p style='margin:0;padding:4px'><i class="fa-solid p-1 rounded-circle fa-xmark mr-1 text-white bg-danger"></i>Warning: you have already added <a href="<?= base_url('laptop/show/'.$row['slug']) ?>"><?=$row['name']?></a> to your product comparision...</p>
          <?php
         }
         else{
            $_SESSION['laptop_compare'][]= $_POST["id"];
            ?>
             <p style='margin:0;padding:4px'><i class="fa-solid p-1 rounded-circle fa-check mr-1 text-white bg-success"></i>success: you have added <a href="<?= base_url('laptop/show/'.$row['slug']) ?>"><?=$row['name']?></a> to your product comparision...</p>

            <?php
         }
      }
      else{
        ?>
             <p style='margin:0;padding:4px'><i class="fa-solid p-1 rounded-circle fa-xmark mr-1 text-white bg-danger"></i>Warning: you are already added maximum product to your product comparision...</p>

        <?php
      }
      ?>
      
      <?php

}
  else{
   $_SESSION['laptop_compare'][]= $_POST["id"];
   ?>
             <p style='margin:0;padding:4px'><i class="fa-solid p-1 rounded-circle fa-check mr-1 text-white bg-success"></i>success: you have added <a href="<?= base_url('laptop/show/'.$row['slug']) ?>"><?=$row['name']?></a> to your product comparision...</p>
   <?php
}
?>
<?php
}
   ?>


<?php
$title='';
if(isset($_POST["comparecart"])){
  if(isset($_SESSION['laptop_compare'])){
     if(count($_SESSION['laptop_compare'])!=0){
       $list = $_SESSION['laptop_compare'];
   ?>
 <div class="compareProductList">
    <div class="d-flex justify-content-between compareCartHeader">
      <p>
        laptop Phones(<?= count($_SESSION['laptop_compare']) ?>)
      </p>
      <div class="pRemoveAll">
        <button role='button' id="pRemoveAllBtn" class="btn pRemoveAllBtn"><i class="fa-solid fa-xmark"></i>Remove all</button>
      </div>
    </div>
    <div class="compareCartBody">

      <div class="compareCartContent position-relative dd mr-2 d-flex">
  <?php
      if (array_key_exists(0, $list)){
        $l0=$list[0];
        $query = "SELECT image,name FROM laptop WHERE id='$l0'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_array($result)){
                  $title.=$row['name'];
                  $files = $row['image']; 
                  $file = explode(",",$files);
                  $image =$file[0]; 
          ?>
             <input type="hidden" value='<?= array_search($l0, $list);  ?>'>
             <div class="singleRemove">
                <i class="fa-solid fa-xmark"></i>
             </div>
            <div class="compareCartImage d-flex align-items-center justify-content-center">
              <div style='height:70px;width:95px;padding:8px;background-color:white'>
                <img style='height:100%;width:100%' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
              </div>
            </div>
            <div class="compareCartTitle">
              <p><?= $row['name'] ?></p>
            </div>
    <?php
          }}
          }
      else{
      ?>
      <div class='d-flex;'>
          <div>
              <p class="chartAdd p-1 mt-4" style='font-size:13px;border-radius:2px'>Add Another Product</p>
          </div>
      </div>
  <?php
      }
      ?>
      </div>
      <div class="compareCartContent position-relative dd mr-2 d-flex">
  <?php
      if (array_key_exists(1, $list)){
        $l1=$list[1];
        $query = "SELECT image,name FROM laptop WHERE id='$l1'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_array($result)){
                  $title.=' vs '.$row['name'];
                  $files = $row['image']; 
                  $file = explode(",",$files);
                  $image =$file[0]; 
          ?>
             <input type="hidden" value='<?= array_search($l1, $list);  ?>'>
             <div class="singleRemove">
                <i class="fa-solid fa-xmark"></i>
             </div>
             <div class="compareCartImage d-flex align-items-center justify-content-center">
              <div style='height:70px;width:95px;padding:8px;background-color:white'>
                <img style='height:100%;width:100%' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
              </div>
            </div>
            <div class="compareCartTitle">
              <p><?= $row['name'] ?></p>
            </div>

    <?php
          }}
          }
      else{
      ?>
      <div class='d-flex;'>
          <div>
              <p class="chartAdd btn btn-primary p-1 mt-4"  style='text-transform:none;font-size:13px;border-radius:2px'>Add Another Product</p>
          </div>
      </div>
  <?php
      }
      ?>
      </div>

      <div class="compareCartContent position-relative dd mr-2 d-flex">
  <?php
      if (array_key_exists(2, $list)){
        $l2=$list[2];
        $query = "SELECT image,name FROM laptop WHERE id='$l2'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_array($result)){
                  $title.=' vs '.$row['name'];
                  $files = $row['image']; 
                  $file = explode(",",$files);
                  $image =$file[0]; 
          ?>
             <input type="hidden" value='<?= array_search($l2, $list);  ?>'>
             <div class="singleRemove">
                <i class="fa-solid fa-xmark"></i>
             </div>
             <div class="compareCartImage d-flex align-items-center justify-content-center">
              <div style='height:70px;width:95px;padding:8px;background-color:white'>
                <img style='height:100%;width:100%' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
              </div>
            </div>
            <div class="compareCartTitle">
              <p><?= $row['name'] ?></p>
            </div>

  <?php
          }}
          }
      else{
      ?>
      <div class='d-flex;'>
          <div>
            <p class="btn btn-primary chartAdd p-1 mt-4" style='text-transform:none;font-size:13px;border-radius:2px'>Add Another Product</p>
          </div>
      </div>
  <?php
      }
      $title = strtolower(preg_replace('/_/', '-', preg_replace('/ /', '-', $title)));
      ?>
      </div>



<div class="compareCartContent mr-2 d-flex">
          <?php
          if(count($_SESSION['laptop_compare'])<2){
          ?>
          <button  role='button' onclick='alert("Please add at least 2 products in the compare list")' class='btn m-auto'>compare</button>
          <?php
          }
          else{
          ?>
          <a href="<?= base_url('laptop/comparison/').$title?>"   class='btn m-auto compareall'>compare</a>
            <?php
          }
          ?>
        </div>


    </div>
  </div>



<?php
     }}}
?>


<?php
/*

if(isset($_POST["comparecart"])){
   if(isset($_SESSION['laptop_compare'])){
      if(count($_SESSION['laptop_compare'])!=0){
        $list = $_SESSION['laptop_compare'];
    ?>
  <div class="compareProductList">
    <div class="d-flex justify-content-between compareCartHeader">
      <p>
        laptop Phones(<?= count($_SESSION['laptop_compare']) ?>)
      </p>
      <div class="pRemoveAll">
        <button role='button' id="pRemoveAllBtn" class="btn pRemoveAllBtn"><i class="fa-solid fa-xmark"></i>Remove all</button>
      </div>
    </div>
    <div class="compareCartBody">
      <?php
      foreach($list as $l){
        $query = "SELECT image,name FROM laptop WHERE id='$l'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result)){
              $files = $row['image']; 
              $file = explode(",",$files);
              $image =$file[0]; 
      ?>
      <div class="compareCartContent position-relative dd mr-2 d-flex">
         <input type="hidden" value='<?= array_search($l, $list);  ?>'>
         <div class="singleRemove">
            <i class="fa-solid fa-xmark"></i>
         </div>
        <div class="compareCartImage">
          <div class="">
            <img style='height:100%' width='auto' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
          </div>
        </div>
        <div class="compareCartTitle">
          <p><?= $row['name'] ?></p>
        </div>
      </div>
      <?php
      }}}
      ?>
     
  
      <div class="compareCartContent mr-2 d-flex">
          <button  role='button' class='btn m-auto compareall'>compare</button>
      </div>
    </div>
  </div>
  <?php
  }}
}
*/
?>
<?php
if(isset($_POST["pRemoveAllBtn"])){
   if(isset($_SESSION['laptop_compare'])){
      unset($_SESSION['laptop_compare']);
   }
}
?>
<?php
if(isset($_POST["singleRemove"])){
   $value = $_POST["value"];
  
   if(isset($_SESSION['laptop_compare'])){
      unset($_SESSION['laptop_compare'][$value]);
   }
   $_SESSION['laptop_compare'] = array_values($_SESSION['laptop_compare']);
}
?>
<?php
if(isset($_POST["compareSearch"])){
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'laptop'";
    $query_run = mysqli_query($con,$query);
    $search_result = array();
        foreach($query_run as $value) {
        foreach($value as $value) {
                $search ="SELECT * from laptop WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["compareSearch"])."%' LIMIT 6";
    
                $result = mysqli_query($con, $search);
                ?>
                <div class="compareSearchListdiv">
<?php
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        if (in_array($row['name'], $search_result, TRUE)){
                        }
                        else{
                            $search_result[]=$row['name'];
                            ?>
                            <div class="d-flex pp pt-1 justify-content-between">
                              <input type="hidden" value='<?= $row['id'] ?>'>
                              <p class="compareSearchList" style="margin:0;color:black;font-size:16px" ><?= $row['name'] ?></p>
                              <p style="margin:0;color:black;font-size:12px">laptop</p>
                            </div>
<?php
                        }
                        ?>
                    
<?php
                    }
                }
                ?>
                </div>
<?php
        }
           
                
            }
    }

?>



























<script>
  const chartAdd = document.querySelector('.chartAdd');
  const compareSearchList = document.getElementsByClassName("compareSearchList");
  const compareChartSearch = document.querySelector('.compareChartSearch');

  chartAdd.addEventListener("click", () => {
    compareChartSearch.classList.add('active');
    compareChartSearch.classList.remove('close');

})

compareSearchList.addEventListener("click", () => {
    compareChartSearch.classList.add('close');
    compareChartSearch.classList.remove('active');

})
</script>



<style>

.singleRemove{
  width:18px;
  height:18px;
  outline:1px solid rgb(237, 84, 84);
  position: absolute;
  z-index:1200;
  right:5px;
  top:5px;
  border-radius:50%;
  display:flex;
  justify-content:center;
  align-items:center;
  transition:0.3s;
  
}
.singleRemove i{
   font-size:14px;
   color:rgb(237, 84, 84);
   transition:0.3s;

}
.singleRemove:hover{
    background-color:red;
    transition:0.3s;

}
.singleRemove:hover i{
   color:white;
   transition:0.3s;
}
</style>