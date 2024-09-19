<?php 
include("../includes/baseurl.php");
include('../config/dbcon.php');

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $description = $_POST['description'];
    $slug = strtolower($_POST['title']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=/', '-', $string);
    $slug=$string;
    $file=array();
	$extension=array('jpeg','jpg','png','gif','jfif','webp');
	$x=1;
    foreach ($_FILES['image']['tmp_name'] as $key => $image) {
		$imageTmpName = $_FILES['image']['tmp_name'][$key];
		$imageName = $_FILES['image']['name'][$key];
		$ext=pathinfo($imageName,PATHINFO_EXTENSION);
		$filename = time().$x.'.'.$ext;
		$x++;
		if(in_array($ext,$extension)){
			move_uploaded_file($imageTmpName,'../upload/category/news/image/'.$filename);
			$file[] = $filename;	
		}	
	}
	$files = implode(",", $file);
    $status = 0;
    $author_id = $_POST['author_id'];
    $query = "INSERT INTO news (title,category,sub_category,slug,description,author_id,image,status) 
            VALUES ('$title','$category','$sub_category','$slug','$description','$author_id','$files','$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'Added Successfully';
        header("location:".$url.'admin/news/add');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header("location:".$url.'admin/news/add');
        exit(0);
    }

    
}
if(isset($_POST['draft'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $description = $_POST['description'];
    $slug = strtolower($_POST['title']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=/', '-', $string);
    $slug=$string;
    $file=array();
	$extension=array('jpeg','jpg','png','gif','jfif','webp');
	$x=1;
    foreach ($_FILES['image']['tmp_name'] as $key => $image) {
		$imageTmpName = $_FILES['image']['tmp_name'][$key];
		$imageName = $_FILES['image']['name'][$key];
		$ext=pathinfo($imageName,PATHINFO_EXTENSION);
		$filename = time().$x.'.'.$ext;
		$x++;
		if(in_array($ext,$extension)){
			move_uploaded_file($imageTmpName,'../upload/category/news/image/'.$filename);
			$file[] = $filename;	
		}	
	}
	$files = implode(",", $file);
    $status = 1;
    $author_id = $_POST['author_id'];
    $query = "INSERT INTO news (title,category,sub_category,slug,description,author_id,image,status) 
            VALUES ('$title','$category','$sub_category','$slug','$description','$author_id','$files','$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'Added Successfully';
        header("location:".$url.'admin/news/add');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header("location:".$url.'admin/news/add');
        exit(0);
    }

    
}
if(isset($_POST['hide'])){
    $all_id = $_POST['select_item1']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE news SET status='2' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Hidden Successfully';
             header("location:".$url.'admin/news/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/news/list');
             exit(0);
         
         }
    }
    else{
     $_SESSION['message'] ='Something Went Worng';
     header("location:".$url.'admin/news/list');
     exit(0);
    }
    
 } 

 if(isset($_POST['visible'])){
    $all_id = $_POST['select_item1']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE news SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Visible Successfully';
             header("location:".$url.'admin/news/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/news/list');
             exit(0);
         
         }
    
        }
 }    

 if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $query= "UPDATE news SET status='3' WHERE id='$id'"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='Deleted Successfully';
        header("location:".$url.'admin/news/list');
        exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/news/list');
        exit(0);

    }
}
if(isset($_POST['delete_all'])){
   $all_id = $_POST['select_item1']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE news SET status='3' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Deleted Successfully';
            header("location:".$url.'admin/news/list');
            exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
            header("location:".$url.'admin/news/list');
            exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
    header("location:".$url.'admin/news/list');
    exit(0);
   }
   
}

if(isset($_POST['visible2'])){
    $all_id = $_POST['select_item2']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE news SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Visible Successfully';
             header("location:".$url.'admin/news/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/news/list');
             exit(0);
         
         }
    
        }
 }  

 if(isset($_POST['restore_all'])){
    $all_id = $_POST['select_item']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE news SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Restored Successfully';
         header("location:".$url.'admin/news/trash');
                 exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/news/trash');
             exit(0);
         
         }
    }
    else{
     $_SESSION['message'] ='Something Went Worng';
     header("location:".$url.'admin/news/trash');
     exit(0);
    }
    
 }    
 if(isset($_POST['restore'])){
     $id=$_POST['restore'] ;
     $query= "UPDATE news SET status='0' WHERE id='$id'"; //2mean delete
     $query_run= mysqli_query($con,$query);
 
     if($query_run){
         $_SESSION['message'] ='Restored successfully';
         header("location:".$url.'admin/news/trash');
             exit(0);
         
     }
     else{
         $_SESSION['message'] ='Something Went Worng';
         header("location:".$url.'admin/news/trash');
             exit(0);
 
     }
 }


 if(isset($_POST['permanently_delete_all'])){
    $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        $query= "DELETE FROM news WHERE id IN ($extract_id)";
        $query_run= mysqli_query($con,$query);

        if($query_run){
            $_SESSION['message'] ='Deleted successfully';
        header("location:".$url.'admin/news/trash');
                exit(0);

        }
        else{
            $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/news/trash');
                exit(0);

        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/news/trash');
        exit(0);
   }
}   





if(isset($_POST['permanently_delete'])){
    $id = $_POST['permanently_delete'];

    $check_image_query = "SELECT image FROM news WHERE id='$id'";
    $image_res = mysqli_query($con, $check_image_query);
    $res_data = mysqli_fetch_array($image_res);
    $image = $res_data["image"];
    $query= "DELETE FROM news WHERE id= '$id' LIMIT 1";
    $query_run= mysqli_query($con,$query);

    
   
    header("location:".$url.'admin/news/trash');
    exit(0);
    }
if(isset($_POST['empty'])){
   
    $query= "DELETE FROM news WHERE status='3'";
    $query_run= mysqli_query($con,$query);

    header("location:".$url.'admin/news/trash');
    exit(0);
    }


    if(isset($_POST['update'])){
        $id =  $_POST['id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
        $description = $_POST['description'];
        $slug = strtolower($_POST['title']);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
        $final_string = preg_replace('/-=/', '-', $string);
        $slug=$string;
        $status  = '0';
     
        $query = "UPDATE news SET title='$title',slug='$slug',category='$category',sub_category='$sub_category',description='$description',status='$status'
                  WHERE id='$id'";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $_SESSION['message'] = 'Upated Successfully';
            header('Location:'.$url.'admin/news/edit/'.$id);
            exit(0);
        }
        else{
            $_SESSION['message'] = 'Something Went Worng';
            header('Location:'.$url.'admin/news/edit/'.$id);
            exit(0);
        }
     
     }
    if(isset($_POST['updateDraft'])){
        $id =  $_POST['id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
        $description = $_POST['description'];
        $slug = strtolower($_POST['title']);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
        $final_string = preg_replace('/-=/', '-', $string);
        $slug=$string;
        $status  = '1';
     
        $query = "UPDATE news SET title='$title',slug='$slug',category='$category',sub_category='$sub_category',description='$description',status='$status'
                  WHERE id='$id'";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $_SESSION['message'] = 'Upated Successfully';
            header('Location:'.$url.'admin/news/edit/'.$id);
            exit(0);
        }
        else{
            $_SESSION['message'] = 'Something Went Worng';
            header('Location:'.$url.'admin/news/edit/'.$id);
            exit(0);
        }
     
     }






?>