
<?php
include("../includes/baseurl.php");
include('../config/dbcon.php');

if(isset($_POST['add']) || isset($_POST['draft'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $slug = strtolower($_POST['name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=/', '-', $string);
    $slug=$string;
/*
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

*/
//
//image store code start
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
			move_uploaded_file($imageTmpName,'../upload/category/laptop/image/'.$filename);
			$file[] = $filename;	
		}	
	}
	$files = implode(",", $file);
	
//image store code end

    $tags = $_POST['tags'];
    $description = $_POST['description'];
    $meta_title = $_POST['name'];
    $meta_description = $_POST['description'];
    $meta_keyword = $_POST['tags'];        
    $series = $_POST['series'];
    $model = $_POST['model'];    
    $utility = $_POST['utility'];
    $device_type = $_POST['device_type'];
    $os = $_POST['os'];
    $dimensions = $_POST['dimensions'];
    $weight = $_POST['weight'];
    $warranty = $_POST['warranty'];
    $display_type = $_POST['display_type'];
    $touch = $_POST['touch'];
    $size = $_POST['size'];
    $resolution = $_POST['resolution'];
    $ppi = $_POST['ppi'];
    $anti_glare_screen = $_POST['anti_glare_screen'];
    $refresh_rate = $_POST['refresh_rate'];
    $features = $_POST['features'];
    $ethernet = $_POST['ethernet'];
    $wifi = $_POST['wifi'];
    $bluetooth = $_POST['bluetooth'];
    $usb_ports = $_POST['usb_ports'];
    $hdmi = $_POST['hdmi'];
    $microphone = $_POST['microphone'];
    $headphone_jack = $_POST['headphone_jack'];
    $security_lock_port = $_POST['security_lock_port'];
    $fingerprint_sensor = $_POST['fingerprint_sensor'];
    $camera = $_POST['camera'];
    $keyboard = $_POST['keyboard'];
    $keyboard_backlit = $_POST['keyboard_backlit'];
    $touchpad = $_POST['touchpad'];
    $inbuilt_microphone = $_POST['inbuilt_microphone'];
    $speakers = $_POST['speakers'];
    $sound = $_POST['sound'];
    $optical_drive = $_POST['optical_drive'];
    $processor = $_POST['processor'];
    $speed = $_POST['speed'];
    $cache = $_POST['cache'];
    $processor_brand = $_POST['processor_brand'];
    $processor_series = $_POST['processor_series'];
    $processor_model = $_POST['processor_model'];
    $generation = $_POST['generation'];
    $chipset = $_POST['chipset'];
    $gpu = $_POST['gpu'];
    $dedicated_memory = $_POST['dedicated_memory'];
    $gpu_brand = $_POST['gpu_brand'];
    $ram = $_POST['ram'];
    $ram_type = $_POST['ram_type'];
    $ram_bus_speed = $_POST['ram_bus_speed'];
    $ram_slots = $_POST['ram_slots'];
    $expandable_memory = $_POST['expandable_memory'];
    $hdd = $_POST['hdd'];
    $ssd = $_POST['ssd'];
    $extra_slot = $_POST['extra_slot'];
    $battery = $_POST['battery'];
    $adapter_type = $_POST['adapter_type'];
    $battery_backup = $_POST['battery_backup'];
    $included_software = $_POST['included_software'];
    $sales_package = $_POST['sales_package'];
    $others_features = $_POST['others_features'];
    $extra = $_POST['extra'];

    if(isset($_POST['add'])){
        $status = 0;
    }
    if(isset($_POST['draft'])){
        $status = 1;
    }
    $query = "INSERT INTO laptop SET name='$name',brand='$brand',price='$price',slug='$slug',image='$files',tags='$tags',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',series='$series',model='$model',utility='$utility',device_type='$device_type',os='$os',dimensions='$dimensions',weight='$weight',warranty='$warranty',display_type='$display_type',touch='$touch',size='$size',resolution='$resolution',ppi='$ppi',anti_glare_screen='$anti_glare_screen',refresh_rate='$refresh_rate',features='$features',ethernet='$ethernet',wifi='$wifi',bluetooth='$bluetooth',usb_ports='$usb_ports',hdmi='$hdmi',microphone='$microphone',headphone_jack='$headphone_jack',security_lock_port='$security_lock_port',fingerprint_sensor='$fingerprint_sensor',camera='$camera',keyboard='$keyboard',keyboard_backlit='$keyboard_backlit',touchpad='$touchpad',inbuilt_microphone='$inbuilt_microphone',speakers='$speakers',sound='$sound',optical_drive='$optical_drive',processor='$processor',speed='$speed',cache='$cache',processor_brand='$processor_brand',processor_series='$processor_series',processor_model='$processor_model',generation='$generation',chipset='$chipset',gpu='$gpu',dedicated_memory='$dedicated_memory',gpu_brand='$gpu_brand',ram='$ram',ram_type='$ram_type',ram_bus_speed='$ram_bus_speed',ram_slots='$ram_slots',expandable_memory='$expandable_memory',hdd='$hdd',ssd='$ssd',extra_slot='$extra_slot',battery='$battery',adapter_type='$adapter_type',battery_backup='$battery_backup',included_software='$included_software',sales_package='$sales_package',others_features='$others_features',extra='$extra',status='$status'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'Added Successfully';
        header("location:".$url.'admin/laptop/add');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header("location:".$url.'admin/laptop/add');
        exit(0);
    }

}
if(isset($_POST['update']) || isset($_POST['update_draft'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $slug = strtolower($_POST['name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=/', '-', $string);
    $slug=$string;
/*
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

*/
//
//image store code start
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
			move_uploaded_file($imageTmpName,'../upload/category/laptop/image/'.$filename);
			$file[] = $filename;	
		}	
	}
    if($imageName != NULL){
        $files = implode(",", $file);
    }
    else{
        $files = $_POST['old_image'];
    }
	

    $tags = $_POST['tags'];
    $description = $_POST['description'];
    $meta_title = $_POST['name'];
    $meta_description = $_POST['description'];
    $meta_keyword = $_POST['tags'];        
    $series = $_POST['series'];
    $model = $_POST['model'];    
    $utility = $_POST['utility'];
    $device_type = $_POST['device_type'];
    $os = $_POST['os'];
    $dimensions = $_POST['dimensions'];
    $weight = $_POST['weight'];
    $warranty = $_POST['warranty'];
    $display_type = $_POST['display_type'];
    $touch = $_POST['touch'];
    $size = $_POST['size'];
    $resolution = $_POST['resolution'];
    $ppi = $_POST['ppi'];
    $anti_glare_screen = $_POST['anti_glare_screen'];
    $refresh_rate = $_POST['refresh_rate'];
    $features = $_POST['features'];
    $ethernet = $_POST['ethernet'];
    $wifi = $_POST['wifi'];
    $bluetooth = $_POST['bluetooth'];
    $usb_ports = $_POST['usb_ports'];
    $hdmi = $_POST['hdmi'];
    $microphone = $_POST['microphone'];
    $headphone_jack = $_POST['headphone_jack'];
    $security_lock_port = $_POST['security_lock_port'];
    $fingerprint_sensor = $_POST['fingerprint_sensor'];
    $camera = $_POST['camera'];
    $keyboard = $_POST['keyboard'];
    $keyboard_backlit = $_POST['keyboard_backlit'];
    $touchpad = $_POST['touchpad'];
    $inbuilt_microphone = $_POST['inbuilt_microphone'];
    $speakers = $_POST['speakers'];
    $sound = $_POST['sound'];
    $optical_drive = $_POST['optical_drive'];
    $processor = $_POST['processor'];
    $speed = $_POST['speed'];
    $cache = $_POST['cache'];
    $processor_brand = $_POST['processor_brand'];
    $processor_series = $_POST['processor_series'];
    $processor_model = $_POST['processor_model'];
    $generation = $_POST['generation'];
    $chipset = $_POST['chipset'];
    $gpu = $_POST['gpu'];
    $dedicated_memory = $_POST['dedicated_memory'];
    $gpu_brand = $_POST['gpu_brand'];
    $ram = $_POST['ram'];
    $ram_type = $_POST['ram_type'];
    $ram_bus_speed = $_POST['ram_bus_speed'];
    $ram_slots = $_POST['ram_slots'];
    $expandable_memory = $_POST['expandable_memory'];
    $hdd = $_POST['hdd'];
    $ssd = $_POST['ssd'];
    $extra_slot = $_POST['extra_slot'];
    $battery = $_POST['battery'];
    $adapter_type = $_POST['adapter_type'];
    $battery_backup = $_POST['battery_backup'];
    $included_software = $_POST['included_software'];
    $sales_package = $_POST['sales_package'];
    $others_features = $_POST['others_features'];
    $extra = $_POST['extra'];

    if(isset($_POST['update'])){
        $status = 0;
    }
    if(isset($_POST['update_draft'])){
        $status = 1;
    }

    $query = "UPDATE laptop SET name='$name',brand='$brand',price='$price',slug='$slug',image='$files',tags='$tags',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',series='$series',model='$model',utility='$utility',device_type='$device_type',os='$os',dimensions='$dimensions',weight='$weight',warranty='$warranty',display_type='$display_type',touch='$touch',size='$size',resolution='$resolution',ppi='$ppi',anti_glare_screen='$anti_glare_screen',refresh_rate='$refresh_rate',features='$features',ethernet='$ethernet',wifi='$wifi',bluetooth='$bluetooth',usb_ports='$usb_ports',hdmi='$hdmi',microphone='$microphone',headphone_jack='$headphone_jack',security_lock_port='$security_lock_port',fingerprint_sensor='$fingerprint_sensor',camera='$camera',keyboard='$keyboard',keyboard_backlit='$keyboard_backlit',touchpad='$touchpad',inbuilt_microphone='$inbuilt_microphone',speakers='$speakers',sound='$sound',optical_drive='$optical_drive',processor='$processor',speed='$speed',cache='$cache',processor_brand='$processor_brand',processor_series='$processor_series',processor_model='$processor_model',generation='$generation',chipset='$chipset',gpu='$gpu',dedicated_memory='$dedicated_memory',gpu_brand='$gpu_brand',ram='$ram',ram_type='$ram_type',ram_bus_speed='$ram_bus_speed',ram_slots='$ram_slots',expandable_memory='$expandable_memory',hdd='$hdd',ssd='$ssd',extra_slot='$extra_slot',battery='$battery',adapter_type='$adapter_type',battery_backup='$battery_backup',included_software='$included_software',sales_package='$sales_package',others_features='$others_features',extra='$extra',status='$status' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'Added Successfully';
        header('Location:'.$url.'admin/laptop/edit/'.$id);
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header('Location:'.$url.'admin/laptop/edit/'.$id);
        exit(0);
        
    }
    
}



















if(isset($_POST['hide'])){
    $all_id = $_POST['select_item1']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE laptop SET status='2' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Hidden Successfully';
             header("location:".$url.'admin/laptop/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/laptop/list');
             exit(0);
         
         }
    }
    else{
     $_SESSION['message'] ='Something Went Worng';
     header("location:".$url.'admin/laptop/list');
     exit(0);
    }
    
 } 

 if(isset($_POST['visible'])){
    $all_id = $_POST['select_item1']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE laptop SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Visible Successfully';
             header("location:".$url.'admin/laptop/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/laptop/list');
             exit(0);
         
         }
    
        }
 }    

 if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $query= "UPDATE laptop SET status='3' WHERE id='$id'"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='Deleted Successfully';
        header("location:".$url.'admin/laptop/list');
        exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/laptop/list');
        exit(0);

    }
}
if(isset($_POST['delete_all'])){
   $all_id = $_POST['select_item1']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE laptop SET status='3' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Deleted Successfully';
            header("location:".$url.'admin/laptop/list');
            exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
            header("location:".$url.'admin/laptop/list');
            exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
    header("location:".$url.'admin/laptop/list');
    exit(0);
   }
   
}

if(isset($_POST['visible2'])){
    $all_id = $_POST['select_item2']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE laptop SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Visible Successfully';
             header("location:".$url.'admin/laptop/list');
             exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/laptop/list');
             exit(0);
         
         }
    
        }
 }  

 if(isset($_POST['restore_all'])){
    $all_id = $_POST['select_item']??null;
    if($all_id !=NULL){
 
         $extract_id = implode(',',$all_id);
         
         $query= "UPDATE laptop SET status='0' WHERE id IN ($extract_id)"; //2mean delete
         $query_run= mysqli_query($con,$query);
         
         if($query_run){
             $_SESSION['message'] ='Restored Successfully';
         header("location:".$url.'admin/laptop/trash');
                 exit(0);
             
         }
         else{
             $_SESSION['message'] ='Something Went Worng';
             header("location:".$url.'admin/laptop/trash');
             exit(0);
         
         }
    }
    else{
     $_SESSION['message'] ='Something Went Worng';
     header("location:".$url.'admin/laptop/trash');
     exit(0);
    }
    
 }    
 if(isset($_POST['restore'])){
     $id=$_POST['restore'] ;
     $query= "UPDATE laptop SET status='0' WHERE id='$id'"; //2mean delete
     $query_run= mysqli_query($con,$query);
 
     if($query_run){
         $_SESSION['message'] ='Restored successfully';
         header("location:".$url.'admin/laptop/trash');
             exit(0);
         
     }
     else{
         $_SESSION['message'] ='Something Went Worng';
         header("location:".$url.'admin/laptop/trash');
             exit(0);
 
     }
 }


 if(isset($_POST['permanently_delete_all'])){
    $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        $query= "DELETE FROM laptop WHERE id IN ($extract_id)";
        $query_run= mysqli_query($con,$query);

        if($query_run){
            $_SESSION['message'] ='Deleted successfully';
        header("location:".$url.'admin/laptop/trash');
                exit(0);

        }
        else{
            $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/laptop/trash');
                exit(0);

        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/laptop/trash');
        exit(0);
   }
}   





if(isset($_POST['permanently_delete'])){
    $id = $_POST['permanently_delete'];

    $check_image_query = "SELECT image FROM laptop WHERE id='$id'";
    $image_res = mysqli_query($con, $check_image_query);
    $res_data = mysqli_fetch_array($image_res);
    $image = $res_data["image"];
    $query= "DELETE FROM laptop WHERE id= '$id' LIMIT 1";
    $query_run= mysqli_query($con,$query);

    
   
    header("location:".$url.'admin/laptop/trash');
    exit(0);
    }
if(isset($_POST['empty'])){
   
    $query= "DELETE FROM laptop WHERE status='3'";
    $query_run= mysqli_query($con,$query);

    header("location:".$url.'admin/laptop/trash');
    exit(0);
    }


    
