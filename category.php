<?php
/*


$connect = new PDO("mysql:host=localhost;dbname=vs", "root", "");
include("admin/config/dbcon.php");



$tables = mysqli_query($con, "SHOW TABLES");

   while($table = mysqli_fetch_object($tables)){

    foreach($table as $value)
    if($value != "user"){
        $tname= $value;

        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tname'";
        $query_run = mysqli_query($con,$query);
   
    foreach($query_run as $value) {
             
                    foreach($value as $value) {
                        if($value != "id"){
                    
                       
                        
                      
                            if($tname == "mobile"){
                               $search = "SELECT * FROM $tname where status= '0' and id ='5'";
                                $result = mysqli_query($con,$search);
                                $search_result =array();
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        array_push($search_result, $tname($qbProduct => $row["id"]));
                               
                                    }}}
                        }
                }
              
               
        }}}
   

        */

   ?>


<?php
$connect = new PDO("mysql:host=localhost;dbname=vs", "root", "");
include("admin/config/dbcon.php");


        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'mobile'";
        $query_run = mysqli_query($con,$query);
                    foreach($query_run as $value) {
                        if($value != "id"){                           
                            $search ="SELECT * from mobile WHERE status='0' and id='2' Limit 6";

                            $result = mysqli_query($con, $search);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                
                        <li class="pt-1 criteria-list" style="font-size: 16px;"><?=$row['name']?> </li>
                        
                                <?php
                                }
                            }
                            }
                        }


   ?>



























<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "vs";

$con =mysqli_connect("$host","$username","$password","$database",);


$connect = new PDO("mysql:host=localhost;dbname=vs", "root", "");

if(isset($_POST["action"]))
{
  
	$query = "
		SELECT * FROM mobile WHERE status = '0'
	";
    ?>
    



     <div class="filter-type">
           
  

            <div class="d-flex p-1">
              <h5>FILTER:</h5>

               
             
        
    <?php
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
        $query .= "
         AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";
        ?>
        <div class="d-flex filter-data">
            <p>
                Price:
            </p>
            <small><?php echo $_POST["minimum_price"] ?>- <?php echo $_POST["maximum_price"] ?></small>
        </div>
      <?php
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brand IN('".$brand_filter."')
		";
        $brand=explode("','",$brand_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                Brand:
            </p>
            <?php
              foreach($brand as $value) {
            ?>

            <small><?= $value?></small>
            <?php 
              }
            
            ?>
        </div>
      <?php
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND ram IN('".$ram_filter."')
		";
        $ram=explode("','",$ram_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                ram:
            </p>
            <?php
              foreach($ram as $value) {
            ?>

            <small><?= $value?>GB</small>
            <?php 
              }
            
            ?>
        </div>
      <?php
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND storage IN('".$storage_filter."')
		";
        $storage=explode("','",$storage_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                Inbuilt Mermory:
            </p>
            <?php
              foreach($storage as $value) {
            ?>

            <small><?= $value?>GB</small>
            <?php 
              }
            
            ?>
        </div>
      <?php
	}
	if(isset($_POST["connctivity"]))
    
	{	
        $connctivity=$_POST["connctivity"];
        $connctivity_list = array("3g", "4g", "5g","volte","wifi","headphone_jack");
        ?>
        <div class="d-flex filter-data">
        <p>
            Connectivity:
        </p>
       
        <?php 
          
        
        
   
        foreach($connctivity_list as $value) {
            foreach($connctivity as $value2) {
                if($value==$value2){
                    $query .="AND $value = '1'";
                    if($value=="headphone_jack"){
                    ?>
                    <small>3.5MM Jack</small>
                    <?php
                    }
                    else{
                    ?>
                    <small><?= $value?></small>
                    <?php
                    }
                }

        }
    }
		?>
         </div>
        <?php
    
	}
	if(isset($_POST["camera"]))
    
	{	
        $camera=$_POST["camera"];
        $camera_list = array("flash", "rear_camera", "front_camera","rear_camera_details");
        ?>
        <div class="d-flex filter-data">
        <p>
            Camera:
        </p>
       
        <?php
          
        
        
   
        foreach($camera as $feature) {
        foreach($camera_list as $value) {
                if($value==$feature){
                    $query .="AND $value = '1'";
                }
                else if($value == "rear_camera_details"){
                    $list = array();
                    $search = "SELECT rear_camera_details FROM mobile where status= '0'";
                    $result = mysqli_query($con,$search);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $str = $row['rear_camera_details'];
                            if(){
                                
                            }
                           else{
                            $target =(explode(" ",$str));
                            $t=(int)preg_replace('/MP/', '', $target[0]);
                            $s=(int)preg_replace('/MP/', '', (explode(" ",$feature))[0]);
                            $s=(int)$feature;
                            if($s<=$t){
                                $list[]=$str;
                            }
                           }
                            
                        }
                        
                        
                        
                        
                        
                           
                         
                         
                        
                    }
                    
                    $filter = implode("','", $list);
    $query .= "
     AND rear_camera_details IN('".$filter."')
    ";
    $rear_camera_details=explode("','",$filter);
                   
?>

    <small><?= $feature ?></small>
  <?php                  
                }       
                

        }
      
       
    }
		?>
         </div>
        <?php
       
    
	}
	




    if(isset($_POST["criteria"])){ 
        $result = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'mobile'";
        $result_run = mysqli_query($con,$result);
        $search_result = array();
            foreach($result_run as $value) {
            foreach($value as $value) {
                    $search ="SELECT * from mobile WHERE status='0' AND $value LIKE '{$_POST['criteria'][0]}%'";
        
                    $result = mysqli_query($con, $search);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            if (in_array($row['name'], $search_result, TRUE)){
                            }
                            else{
                                $search_result[]=$row['name'];
                                ?>
                              <?php
                            }
                            ?>
                        
                
                        <?php
                        }
                    }
            }
               
                    
                }
                $criteri_filter = implode("','", $search_result);
    $query .= "
     AND name IN('".$criteri_filter."')
    ";
    $name=explode("','",$criteri_filter);

?>
 <div class="d-flex filter-data">
            
            <?php
              foreach($_POST["criteria"] as $value) {
            ?>

            <small><?= $value?></small>
            <?php 
              }
            
            ?>
        </div>

<?php


        }
    













    ?>
     </div>
            
            <hr>
                      </div>

    <?php












    if(isset($_POST["sort"]))
	{
        $sort = $_POST["sort"];
		$query .="ORDER BY $sort[0]";
       
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
           
			$files = $row['image']; 
    $file = explode(",",$files);
    $image =$file[0];
    ?>
    <div class="product_box">
    <div class="product_image">
    <div>
        <img src="admin/upload/category/mobile/image/<?= $image ?>" alt="<?= $image ?>">
    </div>

    </div>


    <div class="product_details">
        <h2>
            <?= $row['name']?>
        </h2>
        <hr>
        <div class="product_header">
        <h4>Product feature</h4>
        <small>        
            <a href="page/mobile.php?id=<?= $row['id'] ?>">view all sepecification</a>
        </small>
        </div>


        <div class="row mt-2">
        <div class="col-md-6">
    <p>
    <i class="fa-solid fa-check"></i>
    <?php
    if($row['dual_sim'] == '1'){
    echo 'Dual sim';
    }
    if($row['3g'] == '1'){
    echo ', 3G';
    }
    if($row['4g'] == '1'){
    echo ', 4G';
    }
    if($row['5g'] == '1'){
    echo ', 5G';
    }
    if($row['volte'] == '1'){
    echo ', VoLTE';
    }
    if($row['wifi'] == '1'){
    echo ', Wifi';
    }
    if(!is_null($row['extra'])){

    echo ', '.$row['extra'];
    }
    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['core_details'])){

    echo $row['core_details'];
    }

    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['ram'])){

    echo $row['ram'].'GB Ram, ';
    }

    ?>
    <?php 
    if(!is_null($row['storage'])){

    echo $row['storage'].'GB inbuilt Memory';
    }

    ?>
    </p>

    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['battery_size'])){

    echo $row['battery_size'].' ';
    }

    ?>
    <?php
    if($row['fast_charging'] == '1'){
    if(!is_null($row['fast_charging_details'])){

        echo 'with'.$row['fast_charging_details'];
    }
    
    }
    ?>
    </p>
        </div>
        <div class="col-md-6 sm-none">
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['size'])){

    echo $row['size'];
    }
    if(!is_null($row['refresh_rate'])){

    echo ', '.$row['refresh_rate'].' display';
    }

    ?>
    </p>
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if($row['rear_camera'] == '1')
    echo $row['rear_camera_details']
    ?>
    <?php 
    if($row['front_camera'] == '1')
    echo ', '.$row['front_camera_details']
    ?>
    </p>
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if($row['card_slot'] == '1')
    echo 'memory card supported '.$row['card_slot_details']
    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>

    <?php 

    if(!is_null($row['os'])){

    echo $row['os'];
    }


    ?>
    </p>
        </div>
        </div>
    </div>
    </div>


		
        
    <?php    
		}
	}
	else
	{
		$output = '<h3 class="m-auto text-danger bold">No Data Found</h3>';
	}
	echo $output;
}


else{


if(isset($_POST["category"]))
$brand =$_POST["category"];

{
	$query = "
		SELECT * FROM mobile WHERE brand='$brand' and status = '0'
	";
	?>
    






     <div class="filter-type">
    
  

            <div class="d-flex p-1">
              <h5>FILTER:</h5>

               
             
        
    <?php
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
        $query .= "
         AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";
        ?>
        <div class="d-flex filter-data">
            <p>
                Price:
            </p>
            <small><?php echo $_POST["minimum_price"] ?>- <?php echo $_POST["maximum_price"] ?></small>
        </div>
      <?php
	
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND ram IN('".$ram_filter."')
		";
        $ram=explode("','",$ram_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                ram:
            </p>
            <?php
              foreach($ram as $value) {
            ?>

            <small><?= $value?>GB</small>
            <?php 
              }
            
            ?>
        </div>
      <?php
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND storage IN('".$storage_filter."')
		";
        $storage=explode("','",$storage_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                Inbuilt Mermory:
            </p>
            <?php
              foreach($storage as $value) {
            ?>

            <small><?= $value?>GB</small>
            <?php 
              }
            
            ?>
        </div>
      <?php
	}
	if(isset($_POST["criteria"]))
	{
		$storage_filter = implode("','", $_POST["criteria"]);
		$query .= "
		 AND * IN('".$criteria_filter."')
		";
	}
    ?>
     </div>
            
            <hr>
                      </div>
    <?php
  if(isset($_POST["sort"]))
  {
      $sort = $_POST["sort"];
      $query .="ORDER BY $sort[0]";
     
  }
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
           
			$files = $row['image']; 
    $file = explode(",",$files);
    $image =$file[0];
    ?>
    <div class="product_box">
    <div class="product_image">
    <div>
        <img src="admin/upload/category/mobile/image/<?= $image ?>" alt="<?= $image ?>">
    </div>

    </div>


    <div class="product_details">
        <h2>
            <?= $row['name']?>
        </h2>
        <hr>
        <div class="product_header">
        <h4>Product feature</h4>
        <small>        
            <a href="page/mobile.php?id=<?= $row['id'] ?>">view all sepecification</a>
        </small>
        </div>


        <div class="row mt-2">
        <div class="col-md-6">
    <p>
    <i class="fa-solid fa-check"></i>
    <?php
    if($row['dual_sim'] == '1'){
    echo 'Dual sim';
    }
    if($row['3g'] == '1'){
    echo ', 3G';
    }
    if($row['4g'] == '1'){
    echo ', 4G';
    }
    if($row['5g'] == '1'){
    echo ', 5G';
    }
    if($row['volte'] == '1'){
    echo ', VoLTE';
    }
    if($row['wifi'] == '1'){
    echo ', Wifi';
    }
    if(!is_null($row['extra'])){

    echo ', '.$row['extra'];
    }
    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['core_details'])){

    echo $row['core_details'];
    }

    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['ram'])){

    echo $row['ram'].'GB Ram, ';
    }

    ?>
    <?php 
    if(!is_null($row['storage'])){

    echo $row['storage'].'GB inbuilt Memory';
    }

    ?>
    </p>

    <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['battery_size'])){

    echo $row['battery_size'].' ';
    }

    ?>
    <?php
    if($row['fast_charging'] == '1'){
    if(!is_null($row['fast_charging_details'])){

        echo 'with'.$row['fast_charging_details'];
    }
    
    }
    ?>
    </p>
        </div>
        <div class="col-md-6 sm-none">
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if(!is_null($row['size'])){

    echo $row['size'];
    }
    if(!is_null($row['refresh_rate'])){

    echo ', '.$row['refresh_rate'].' display';
    }

    ?>
    </p>
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if($row['rear_camera'] == '1')
    echo $row['rear_camera_details']
    ?>
    <?php 
    if($row['front_camera'] == '1')
    echo ', '.$row['front_camera_details']
    ?>
    </p>
        <p>
    <i class="fa-solid fa-check"></i>
    <?php 
    if($row['card_slot'] == '1')
    echo 'memory card supported '.$row['card_slot_details']
    ?>
    </p>
    <p>
    <i class="fa-solid fa-check"></i>

    <?php 

    if(!is_null($row['os'])){

    echo $row['os'];
    }


    ?>
    </p>
        </div>
        </div>
    </div>
    </div>


		
        
        <?php    
		}
	}
	else
	{
		$output = '<h3 class="m-auto text-danger bold">No Data Found</h3>';
	}
	echo $output;
}

}

?>






if(strpos($str, 'autofocus') !== false){
                                    $autofocus_filter = implode("','", $row);
    $query .= "
     AND rear_camera_details IN('".$autofocus_filter."')
    ";
    $rear_camera_details=explode("','",$autofocus_filter);
                                }
                            }