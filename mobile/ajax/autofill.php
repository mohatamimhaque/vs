<?php
include('../includes/config.php');
/* if(isset($_POST["query"])){
    $query ="SELECT name FROM category  WHERE status='0' AND name LIKE '{$_POST['query']}%' OR created_at LIKE '{$_POST['query']}%'
                    UNION ALL
            SELECT name  FROM users  WHERE status='0' AND name LIKE '{$_POST['query']}%' OR created_at LIKE '{$_POST['query']}%' 
                    UNION ALL
            SELECT data  FROM autofill  WHERE data LIKE '{$_POST['query']}%' OR created_at LIKE '{$_POST['query']}%' 
                    
                    ";


    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            ?>
               <ul class="autofill " style="list-style:none;position:relative;padding:5px 8px;background-color:#191C24;z-index:100;overflow:hidden">
            <li class="autofill-list" style="display:flex;justify-content:space-between; padding:5px 0;position:relative">
            <a href="#" class="autofill-list-link" style="font-size:16px;color:white;margin:auto 0;"><?= $row["name"] ;?></a><p style="font-size:10px;margin:auto 0;"></p>
            
            <p style="font-size:10px;margin:auto 0;"> ddwd</p>
            </li>
        </ul>
        <?php
        }
    }
}
*/
?>



























<?php
if(isset($_POST["criteria"])){



    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'mobile'";
    $query_run = mysqli_query($con,$query);
    $search_result = array();
        foreach($query_run as $value) {
        foreach($value as $value) {
                $search ="SELECT * from mobile WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["criteria"])."%' LIMIT 12";
                $result = mysqli_query($con, $search);
                if(mysqli_num_rows($result) > 0){
                    while($item = mysqli_fetch_array($result)){
                        if (in_array($item['name'], $search_result, TRUE)){
                        }
                        else{
                            $search_result[]=$item['name'];
                            ?>
                        <li class="pt-1 criteria-list" style="font-size: 16px;"><?=$item['name']?></li>
                          <?php
                        }
                        ?>
                    
            
                    <?php
                    }
                }
        }
           
                
            }
    }

?>
<?php
if(isset($_POST["comparesearch"])){

    ?>
    
    <div class="position-absolute comparesearchdiv">
    <?php

    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'mobile'";
    $query_run = mysqli_query($con,$query);
    $search_result = array();
        foreach($query_run as $value) {
        foreach($value as $value) {
                $search ="SELECT * from mobile WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["comparesearch"])."%'";
                $result = mysqli_query($con, $search);
                if(mysqli_num_rows($result) > 0){
                    while($item = mysqli_fetch_array($result)){
                        if (in_array($item['name'], $search_result, TRUE)){
                        }
                        else{
                            $search_result[]=$item['name'];
                            ?>
                     <div class="pp">
                                    <input type="hidden" value="<?= $item['id']?>">
                                    <p class="comparesearchlist" style="padding:0;margin:5px 0;COLOR:BLACK"><?=$item['name']?></p>
                                </div>  
                    <?php
                        }
                    }
                }
        }
           
                
            }
            ?>
             </div>
            <?php
    }

?>
