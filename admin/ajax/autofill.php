<?php
include("../config/dbcon.php");
if(isset($_POST["query"])){
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
                <a href="#" style="font-size:16px;color:white;margin:auto 0;">
                    <?= $row["name"] ;?>
                </a>
                <p style="font-size:10px;margin:auto 0;">
                </p>
            </li>
        </ul>
        <?php
        }
    }
}

?>

