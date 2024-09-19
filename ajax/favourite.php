<?php
session_start();
include("../admin/config/dbcon.php");
include("../includes/baseurl.php");
if(isset($_POST["add"])){
    $product_id = $_POST["product_id"];
    $user_id = $_POST["user_id"];
    $column = $_POST["column"];
    //user_id check 
    $check = mysqli_query($con, "SELECT * from favourite WHERE user_id='$user_id'");
        if(mysqli_num_rows($check)>0){
            foreach($check as $row){
                if($row[$column] != ''){
                    $data = explode(',',$row[$column]);
                    if(in_array($product_id, $data, TRUE)){
                    }
                    else{
                        $data[]=$product_id;
                        sort($data);
                        $products = implode(',',$data);
                        mysqli_query($con, "UPDATE favourite SET $column='$products' WHERE user_id='$user_id'");
                    }
                }
                else{
                    mysqli_query($con, "UPDATE favourite SET $column='$product_id' WHERE user_id='$user_id'"); 
                }
            }
        }
        else{
            mysqli_query($con, "INSERT INTO favourite SET user_id='$user_id',$column='$product_id'");
        }
}
?>



<?php
if(isset($_POST["remove"])){
    $product_id = $_POST["product_id"];
    $user_id = $_POST["user_id"];
    $column = $_POST["column"];
    $check = mysqli_query($con, "SELECT * from favourite WHERE user_id='$user_id'");
    if(mysqli_num_rows($check)>0){
        foreach($check as $row){
            if($row[$column] != ''){
                $data = explode(',',$row[$column]);
                if(in_array($product_id, $data, TRUE)){
                    if (($key = array_search($product_id, $data)) !== false) {
                        unset($data[$key]);
                    }
                    sort($data);
                    $products = implode(',',$data);
                    mysqli_query($con, "UPDATE favourite SET $column='$products' WHERE user_id='$user_id'");
                }
            }
        }
    }
}
?>



