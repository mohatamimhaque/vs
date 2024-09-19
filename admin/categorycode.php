<?php

include("includes/baseurl.php");
include("authentication.php");

?>
<?php 

if(isset($_POST['category_add'])){
    $name  = $_POST['name'];
    
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    $slug = strtolower($_POST['name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=', '-', $string);
    $slug=$string;
 
    $description  = $_POST['description'];
    $meta_title  = $_POST['meta_title'];
    $meta_description  = $_POST['meta_description'];
    $meta_keyword  = $_POST['meta_keyword'];
    $navbar_status  = $_POST['navbar_status'] == true ? '1' : '0';
    $status  = $_POST['status'] == true ? '1' : '0';
    
    $query = "INSERT INTO category (name,image,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status) VALUES ('$name','$filename','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], 'upload/category/image/'.$filename);
        $_SESSION['message'] = 'Category Added Successfully';
        header("location:".$url.'admin/category/add');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header("location:".$url.'admin/category/add');
        exit(0);
    }
 
 }


 
if(isset($_POST['category_update'])){
    $category_id = $_POST['category_id'];
    $name  = $_POST['name'];
    $old_filename = $_POST["old_image"];
    $image = $_FILES['image']['name'];
    $update_filename='';
    if($image != NULL){
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;
        
        $update_filename=$filename;
    }
    else{
        $update_filename=$old_filename;

    }
    $slug = strtolower($_POST['name']);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=', '-', $string);
    $slug=$string;
 
    $description  = $_POST['description'];
    $meta_title  = $_POST['meta_title'];
    $meta_description  = $_POST['meta_description'];
    $meta_keyword  = $_POST['meta_keyword'];
    $navbar_status  = $_POST['navbar_status'] == true ? '1' : '0';
    $status  = $_POST['status'] == true ? '1' : '0';
 
    $query = "UPDATE category SET name='$name', image='$update_filename',slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',navbar_status='$navbar_status',status='$status'
              WHERE id='$category_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        if($image!=NULL){
            if(file_exists('upload/category/image/'.$old_filename)){
                 unlink("upload/category/image/".$old_filename);
            }

            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/category/image/'.$update_filename);
        }
        else{

        }
        $_SESSION['message'] = 'Category Upated Successfully';
        header('Location:'.$url.'admin/category/edit/'.$category_id);
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header('Location:'.$url.'admin/category/edit/'.$category_id);
        exit(0);
    }
 
 }

 
if(isset($_POST['category_delete'])){
    $category_id=$_POST['category_delete'];
    $query= "UPDATE category SET status='2' WHERE id='$category_id' LIMIT 1"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='Category deleted Successfully';
        header("location:".$url.'admin/category/list');
        exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/category/list');
        exit(0);

    }
}
if(isset($_POST['category_restore'])){
    $category_id=$_POST['category_restore'];
    $query= "UPDATE category SET status='0' WHERE id='$category_id' LIMIT 1"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='Category resotored Successfully';
        header("location:".$url.'admin/category/trash');
        exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/category/trash');
        exit(0);

    }
}





if(isset($_POST['perment_delete'])){
    $id = $_POST['perment_delete'];

    $check_image_query = "SELECT image FROM category WHERE id='$id' LIMIT 1";
    $image_res = mysqli_query($con, $check_image_query);
    $res_data = mysqli_fetch_array($image_res);
    $image = $res_data["image"];
    $query= "DELETE FROM category WHERE id= '$id' LIMIT 1";
    $query_run= mysqli_query($con,$query);
   
    header("location:".$url.'admin/category/trash');
    exit(0);
    }
    else{
        $_SESSION['message'] = "Something Went Work";
        header("location:".$url.'admin/category/trash');
        exit(0);
    
    }





 
?>