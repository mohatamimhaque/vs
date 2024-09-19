<?php
include('../../admin/config/dbcon.php');
include('../includes/baseurl.php');

if(isset($_POST["query"])){
   
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'news'";
    $query_run = mysqli_query($con,$query);
    $search_result = array();
        foreach($query_run as $value) {
        foreach($value as $value) {
                $search ="SELECT * from news WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["query"])."%' LIMIT 4";
                $result = mysqli_query($con, $search);
                if(mysqli_num_rows($result) > 0){
                    ?>
                    <div class="searchresult" style='width:100%;padding:0 10px;display:flex;flex-direction:column'>
                    <?php
                    while($item = mysqli_fetch_array($result)){
                        if (in_array($item['id'], $search_result, TRUE)){
                        }
                        else{
                            $search_result[]=$item['id'];
                            ?>
                            <a href="<?= base_url('trace/show/').$item['slug'] ?>" class="p-1" style="margin:2px  0;text-decoration:none;font-size:16px;color:black"><?=$item['title'] ?></a>
                          <?php
                        }
                        ?>
                    
            
                    <?php
                    }
                    ?>
                    </div>
                    <?php
                }
        }
           
                
            }
           
    }

?>



