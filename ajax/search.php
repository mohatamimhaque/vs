<?php
include("../admin/config/dbcon.php");
include("../includes/baseurl.php");
if(isset($_POST["query"])){
            ?>
            <ul class="autofill shadowdiv" style="list-style:none;position:relative;padding:5px 8px;background-color:#191C24;z-index:100;overflow:hidden;width:500px">
            <?php
    $tables = mysqli_query($con, "SHOW TABLES");
    while($table = mysqli_fetch_object($tables)){
        foreach($table as $value)
        $search_result =array();
        if($value == "mobile"){
            $tname= $value;
            $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tname'";
            $query_run = mysqli_query($con,$query);
            foreach($query_run as $value) {
                    foreach($value as $value) {
                        if($value != "id"){
                            
                               $search = "SELECT * FROM $tname where status= '0' AND $value LIKE '%".str_replace(" ", "%", $_POST["query"])."%'";
                                $result = mysqli_query($con,$search);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        if (in_array($row['name'], $search_result, TRUE)){
                                        }
                                        else{
                                            $search_result[]=$row['name'];
                                            ?>
            <li class="autofill-list" style="display:flex;justify-content:space-between; padding:5px 0;position:relative">
            <a href="<?=base_url('mobile/show/').$row['slug']?>" class="autofill-list-link" style="font-size:16px;color:white;margin:auto 0;"><?= $row["name"] ;?></a><p style="font-size:10px;margin:auto 0;"></p>
            
            <a  href = "mobile.php?brand=<?= $row['brand']?>" style="font-size:10px;margin:auto 0;color:white"><p style="font-size:10px;margin:auto 0;"><?=$tname?></p></a>
            </li>
       
                                          <?php
                                        }
                               
                                }
                            }
                        
                    }
                }
            } 
               
        }
        else if($value == "laptop"){
            $tname= $value;
            $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tname'";
            $query_run = mysqli_query($con,$query);
            foreach($query_run as $value) {
                    foreach($value as $value) {
                        if($value != "id"){
                            
                               $search = "SELECT * FROM $tname where status= '0' AND $value LIKE '%".str_replace(" ", "%", $_POST["query"])."%'";
                                $result = mysqli_query($con,$search);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        if (in_array($row['name'], $search_result, TRUE)){
                                        }
                                        else{
                                            $search_result[]=$row['name'];
                                            ?>
            <li class="autofill-list" style="display:flex;justify-content:space-between; padding:5px 0;position:relative">
            <a href="<?=base_url('laptop/show/').$row['slug']?>" class="autofill-list-link" style="font-size:16px;color:white;margin:auto 0;"><?= $row["name"] ;?></a><p style="font-size:10px;margin:auto 0;"></p>
            
            <a style="font-size:10px;margin:auto 0;color:white"><p style="font-size:10px;margin:auto 0;"><?=$tname?></p></a>
            </li>
            
                                          <?php
                                        }
                               
                                }
                            }
                        
                    }
                }
            } 
               
        }
      
   

        else if($value == "category"){
            $tname= $value;
            $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tname'";
            $query_run = mysqli_query($con,$query);
            foreach($query_run as $value) {
                    foreach($value as $value) {
                        if($value != "id"){
                            
                               $search = "SELECT * FROM $tname where status= '0' AND name LIKE '%".str_replace(" ", "%", $_POST["query"])."%'";
                                $result = mysqli_query($con,$search);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        if (in_array($row['name'], $search_result, TRUE)){
                                        }
                                        else{
                                            $search_result[]=$row['name'];
                                            ?>
            <li class="autofill-list" style="display:flex;justify-content:space-between; padding:5px 0;position:relative">
            <a class="autofill-list-link" href="<?= base_url(strtolower($row['name'])) ?>" style="font-size:16px;color:white;margin:auto 0;"><?= $row["name"] ;?></a><p style="font-size:10px;margin:auto 0;"></p>
            
            <a style="font-size:10px;margin:auto 0;color:white"><p style="font-size:10px;margin:auto 0;"><?=$tname?></p></a>
            </li>
                                          <?php
                                        }
                               
                                }
                            }
                        
                    }
                }
            } }
        else if($value == "Autofill"){
            $tname= $value;
            $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tname'";
            $query_run = mysqli_query($con,$query);
            foreach($query_run as $value) {
                    foreach($value as $value) {
                        if($value != "id"){
                            
                               $search = "SELECT * FROM $tname where status= '0' AND data LIKE '%".str_replace(" ", "%", $_POST["query"])."%'";
                                $result = mysqli_query($con,$search);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        if (in_array($row['data'], $search_result, TRUE)){
                                        }
                                        else{
                                            $search_result[]=$row['data'];
                                            ?>
            <li class="autofill-list" style="display:flex;justify-content:space-between; padding:5px 0;position:relative">
            <a class="autofill-list-link" style="font-size:16px;color:white;margin:auto 0;"><?= $row["data"] ;?></a><p style="font-size:10px;margin:auto 0;"></p>
            
            <a style="font-size:10px;margin:auto 0;color:white"><p style="font-size:10px;margin:auto 0;">Recent search</p></a>
            </li>
                                          <?php
                                        }
                               
                                }
                            }
                        
                    }
                }
            } 
               
        }
       
   

}
?>
</ul>
<?php
}



?>

