
<?php
include("../includes/baseurl.php");
include('../config/dbcon.php');

if(isset($_POST['add'])){
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
			move_uploaded_file($imageTmpName,'../upload/category/mobile/image/'.$filename);
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
    $sim_type = $_POST['sim_type'];
    $dual_sim = $_POST['dual_sim']?? null == true ? '1' : '0';
    $sim_size = $_POST['sim_size'];
    $device_type = $_POST['device_type'];
    $release_date = $_POST['release_date'];
    $dimensions = $_POST['dimensions'];
    $wieght = $_POST['wieght'];
    $display_type = $_POST['display_type'];
    $refresh_rate = $_POST['refresh_rate'];
    $touch = $_POST['touch'] ?? null == true ? '1' : '0';
    $touch_details = $_POST['touch_details'];
    $size = $_POST['size'];
    $aspect_raito = $_POST['aspect_raito'];
    $ppi = $_POST['ppi'];
    $sb_ratio = $_POST['sb_ratio'];
    $glass_type = $_POST['glass_type'];
    $notch = $_POST['notch']?? null == true ? '1' : '0';
    $notch_details = $_POST['notch_details'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $card_slot = $_POST['card_slot']?? null == true ? '1' : '0';
    $card_slot_details = $_POST['card_slot_details'];
    $gprs = $_POST['gprs']?? null == true ? '1' : '0';
    $edge = $_POST['edge']?? null == true ? '1' : '0';
    $threeG = $_POST['3g']?? null == true ? '1' : '0';
    $fourG = $_POST['4g']?? null == true ? '1' : '0';
    $fiveG = $_POST['5g']?? null == true ? '1' : '0';
    $volte = $_POST['volte']?? null == true ? '1' : '0';
    $volte_details = $_POST['volte_details'];
    $wifi = $_POST['wifi']?? null == true ? '1' : '0';
    $wifi_details = $_POST['wifi_details'];
    $blutooth = $_POST['blutooth']?? null == true ? '1' : '0';
    $blutooth_details = $_POST['blutooth_details'];
    $usb = $_POST['usb']?? null == true ? '1' : '0';
    $usb_details = $_POST['usb_details'];
    $usb_feature = $_POST['usb_feature'];
    $gps = $_POST['gps']?? null == true ? '1' : '0';
    $gps_details = $_POST['gps_details'];
    $fingerprint = $_POST['fingerprint']?? null == true ? '1' : '0';
    $fingerprint_details = $_POST['fingerprint_details'];
    $face_unlock = $_POST['face_unlock']?? null == true ? '1' : '0';
    $sensors = $_POST['sensors'];
    $headphone_jack = $_POST['headphone_jack']?? null == true ? '1' : '0';
    $extra = $_POST['extra'];
    $rear_camera = $_POST['rear_camera']?? null == true ? '1' : '0';
    $rear_camera_details = $_POST['rear_camera_details'];
    $feature = $_POST['feature'];
    $video_recording = $_POST['video_recording']?? null == true ? '1' : '0';
    $video_recording_details = $_POST['video_recording_details'];
    $flash = $_POST['flash']?? null == true ? '1' : '0';
    $flash_type = $_POST['flash_type'];
    $front_camera = $_POST['front_camera']?? null == true ? '1' : '0';
    $front_camera_details = $_POST['front_camera_details'];
    $front_camera_video = $_POST['front_camera_video']?? null == true ? '1' : '0';
    $front_camera_video_details = $_POST['front_camera_video_details'];
    $os = $_POST['os'];
    $chipset = $_POST['chipset'];
    $cpu = $_POST['cpu'];
    $core_details = $_POST['core_details'];
    $gpu = $_POST['gpu'];
    $java = $_POST['java']?? null == true ? '1' : '0';
    $browser = $_POST['browser']?? null == true ? '1' : '0';
    $email = $_POST['email']?? null == true ? '1' : '0';
    $music = $_POST['music']?? null == true ? '1' : '0';
    $music_type = $_POST['music_type'];
    $video = $_POST['video']?? null == true ? '1' : '0';
    $video_type = $_POST['video_type'];
    $fm_radio = $_POST['fm_radio']?? null == true ? '1' : '0';
    $document_reader = $_POST['document_reader']?? null == true ? '1' : '0';
    $battery_type = $_POST['battery_type'];
    $battery_size = $_POST['battery_size'];
    $fast_charging = $_POST['fast_charging']?? null == true ? '1' : '0';
    $fast_charging_details = $_POST['fast_charging_details'];
    $talk_time = $_POST['talk_time'];
    $playback_time = $_POST['playback_time'];


$query = "INSERT INTO mobile (name,brand,price,slug,image,tags,description,meta_title,meta_description,meta_keyword,sim_type,dual_sim,sim_size,device_type,release_date,dimensions,wieght,display_type,refresh_rate,touch,touch_details,size,aspect_raito,ppi,sb_ratio,glass_type,notch,notch_details,ram,storage,card_slot,card_slot_details,gprs,edge,3g,4g,5g,volte,volte_details,wifi,wifi_details,blutooth,blutooth_details,usb,usb_details,usb_feature,gps,gps_details,fingerprint,fingerprint_details,face_unlock,sensors,headphone_jack,extra,rear_camera,rear_camera_details,feature,video_recording,video_recording_details,flash,flash_type,front_camera,front_camera_details,front_camera_video,front_camera_video_details,os,chipset,cpu,core_details,gpu,java,browser,email,music,music_type,video,video_type,fm_radio,document_reader,battery_type,battery_size,fast_charging,fast_charging_details,talk_time,playback_time) 
            VALUES ('$name','$brand','$price','$slug','$files','$tags','$description','$meta_title','$meta_description','$meta_keyword','$sim_type','$dual_sim','$sim_size','$device_type','$release_date','$dimensions','$wieght','$display_type','$refresh_rate','$touch','$touch_details','$size','$aspect_raito','$ppi','$sb_ratio','$glass_type','$notch','$notch_details','$ram','$storage','$card_slot','$card_slot_details','$gprs','$edge','$threeG','$fourG','$fiveG','$volte','$volte_details','$wifi','$wifi_details','$blutooth','$blutooth_details','$usb','$usb_details','$usb_feature','$gps','$gps_details','$fingerprint','$fingerprint_details','$face_unlock','$sensors','$headphone_jack','$extra','$rear_camera','$rear_camera_details','$feature','$video_recording','$video_recording_details','$flash','$flash_type','$front_camera','$front_camera_details','$front_camera_video','$front_camera_video_details','$os','$chipset','$cpu','$core_details','$gpu','$java','$browser','$email','$music','$music_type','$video','$video_type','$fm_radio','$document_reader','$battery_type','$battery_size','$fast_charging','$fast_charging_details','$talk_time','$playback_time')";
$query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = 'Added Successfully';
        header("location:".$url.'admin/mobile/add');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Something Went Worng';
        header("location:".$url.'admin/mobile/add');
        exit(0);
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $slug = strtolower($_POST['name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);//Remove All     Special Characters
    $final_string = preg_replace('/-=/', '-', $string);
    $slug=$string;

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


    $tags = $_POST['tags'];
    $description = $_POST['description'];
    $meta_title = $_POST['name'];
    $meta_description = $_POST['description'];
    $meta_keyword = $_POST['tags'];        
    $sim_type = $_POST['sim_type'];
    $dual_sim = $_POST['dual_sim']?? null == true ? '1' : '0';
    $sim_size = $_POST['sim_size'];
    $device_type = $_POST['device_type'];
    $release_date = $_POST['release_date'];
    $dimensions = $_POST['dimensions'];
    $wieght = $_POST['wieght'];
    $display_type = $_POST['display_type'];
    $refresh_rate = $_POST['refresh_rate'];
    $touch = $_POST['touch'] ?? null == true ? '1' : '0';
    $touch_details = $_POST['touch_details'];
    $size = $_POST['size'];
    $aspect_raito = $_POST['aspect_raito'];
    $ppi = $_POST['ppi'];
    $sb_ratio = $_POST['sb_ratio'];
    $glass_type = $_POST['glass_type'];
    $notch = $_POST['notch']?? null == true ? '1' : '0';
    $notch_details = $_POST['notch_details'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $card_slot = $_POST['card_slot']?? null == true ? '1' : '0';
    $card_slot_details = $_POST['card_slot_details'];
    $gprs = $_POST['gprs']?? null == true ? '1' : '0';
    $edge = $_POST['edge']?? null == true ? '1' : '0';
    $threeG = $_POST['3g']?? null == true ? '1' : '0';
    $fourG = $_POST['4g']?? null == true ? '1' : '0';
    $fiveG = $_POST['5g']?? null == true ? '1' : '0';
    $volte = $_POST['volte']?? null == true ? '1' : '0';
    $volte_details = $_POST['volte_details'];
    $wifi = $_POST['wifi']?? null == true ? '1' : '0';
    $wifi_details = $_POST['wifi_details'];
    $blutooth = $_POST['blutooth']?? null == true ? '1' : '0';
    $blutooth_details = $_POST['blutooth_details'];
    $usb = $_POST['usb']?? null == true ? '1' : '0';
    $usb_details = $_POST['usb_details'];
    $usb_feature = $_POST['usb_feature'];
    $gps = $_POST['gps']?? null == true ? '1' : '0';
    $gps_details = $_POST['gps_details'];
    $fingerprint = $_POST['fingerprint']?? null == true ? '1' : '0';
    $fingerprint_details = $_POST['fingerprint_details'];
    $face_unlock = $_POST['face_unlock']?? null == true ? '1' : '0';
    $sensors = $_POST['sensors'];
    $headphone_jack = $_POST['headphone_jack']?? null == true ? '1' : '0';
    $extra = $_POST['extra'];
    $rear_camera = $_POST['rear_camera']?? null == true ? '1' : '0';
    $rear_camera_details = $_POST['rear_camera_details'];
    $feature = $_POST['feature'];

    $feture = $_POST['feture'];
    $video_recording = $_POST['video_recording']?? null == true ? '1' : '0';
    $video_recording_details = $_POST['video_recording_details'];
    $flash = $_POST['flash']?? null == true ? '1' : '0';
    $flash_type = $_POST['flash_type'];
    $front_camera = $_POST['front_camera']?? null == true ? '1' : '0';
    $front_camera_details = $_POST['front_camera_details'];
    $front_camera_video = $_POST['front_camera_video']?? null == true ? '1' : '0';
    $front_camera_video_details = $_POST['front_camera_video_details'];
    $os = $_POST['os'];
    $chipset = $_POST['chipset'];
    $cpu = $_POST['cpu'];
    $core_details = $_POST['core_details'];
    $gpu = $_POST['gpu'];
    $java = $_POST['java']?? null == true ? '1' : '0';
    $browser = $_POST['browser']?? null == true ? '1' : '0';
    $email = $_POST['email']?? null == true ? '1' : '0';
    $music = $_POST['music']?? null == true ? '1' : '0';
    $music_type = $_POST['music_type'];
    $video = $_POST['video']?? null == true ? '1' : '0';
    $video_type = $_POST['video_type'];
    $fm_radio = $_POST['fm_radio']?? null == true ? '1' : '0';
    $document_reader = $_POST['document_reader']?? null == true ? '1' : '0';
    $battery_type = $_POST['battery_type'];
    $battery_size = $_POST['battery_size'];
    $fast_charging = $_POST['fast_charging']?? null == true ? '1' : '0';
    $fast_charging_details = $_POST['fast_charging_details'];
    $talk_time = $_POST['talk_time'];
    $playback_time = $_POST['playback_time'];
    $status = $_POST['status']?? null == true ? '1' : '0';







    $query = "UPDATE mobile SET name='$name',brand='$brand',price='$price',slug='$slug', image='$update_filename',tags='$tags',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',
    sim_type='$sim_type',dual_sim='$dual_sim',sim_size='$sim_size',device_type='$device_type',release_date='$release_date',dimensions='$dimensions',wieght='$wieght',display_type='$display_type',refresh_rate='$refresh_rate',
    touch='$touch',touch_details='$touch_details',size='$size',aspect_raito='$aspect_raito',ppi='$ppi',sb_ratio='$sb_ratio',glass_type='$glass_type',notch='$notch',notch_details='$notch_details',ram='$ram',storage='$storage',card_slot='$card_slot',card_slot_details='$card_slot_details',gprs='$gprs',edge='$edge',
    3g='$threeG',4g='$fourG',5g='$fiveG',volte='$volte',volte_details='$volte_details',wifi='$wifi',wifi_details='$wifi_details',blutooth='$blutooth',blutooth_details='$blutooth_details',usb='$usb',usb_details='$usb_details',usb_feature='$usb_feature',gps='$gps',gps_details='$gps_details',fingerprint='$fingerprint',
    fingerprint_details='$fingerprint_details',face_unlock='$face_unlock',sensors='$sensors',headphone_jack='$headphone_jack',extra='$extra',rear_camera='$rear_camera',rear_camera_details='$rear_camera_details',feature='$feature',video_recording='$video_recording',video_recording_details='$video_recording_details',flash='$flash',flash_type='$flash_type',
    front_camera='$front_camera',front_camera_details='$front_camera_details',front_camera_video='$front_camera_video',front_camera_video_details='$front_camera_video_details',os='$os',chipset='$chipset',cpu='$cpu',core_details='$core_details',gpu='$gpu',java='$java',browser='$browser',email='$email',music='$music',
    music_type='$music_type',video='$video',video_type='$video_type',fm_radio='$fm_radio',document_reader='$document_reader',battery_type='$battery_type',battery_size='$battery_size',fast_charging='$fast_charging',fast_charging_details='$fast_charging_details',talk_time='$talk_time',playback_time='$playback_time',status='$status'
    WHERE id='$id'";



$query_run = mysqli_query($con, $query);
if($query_run){
    if($image!=NULL){
        if(file_exists('../upload/category/mobile/image/'.$old_filename)){
             unlink("../upload/category/mobile/image/".$old_filename);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/category/mobile/image/'.$update_filename);
    }
    else{

    }
    $_SESSION['message'] = 'Upated Successfully';
    header('Location:'.$url.'admin/mobile/edit/'.$id);
    exit(0);
}
else{
    $_SESSION['message'] = 'Something Went Worng';
    header('Location:'.$url.'admin/mobile/edit/'.$id);
    exit(0);
}

}




     
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $query= "UPDATE mobile SET status='2' WHERE id='$id'"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='mobile deleted Successfully';
        header("location:".$url.'admin/mobile/list');
        exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/list');
        exit(0);

    }
}
if(isset($_POST['delete_all'])){
   $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE mobile SET status='2' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Deleted Successfully';
            header("location:".$url.'admin/mobile/list');
            exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
            header("location:".$url.'admin/mobile/list');
            exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
    header("location:".$url.'admin/mobile/list');
    exit(0);
   }
   
}    
if(isset($_POST['hide'])){
   $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE mobile SET status='1' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Hiden Successfully';
            header("location:".$url.'admin/mobile/list');
            exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
            header("location:".$url.'admin/mobile/list');
            exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
    header("location:".$url.'admin/mobile/list');
    exit(0);
   }
   
}    
if(isset($_POST['visible'])){
   $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE mobile SET status='0' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Visible Successfully';
            header("location:".$url.'admin/mobile/list');
            exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
            header("location:".$url.'admin/mobile/list');
            exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
    header("location:".$url.'admin/mobile/list');
    exit(0);
   }
   
}    
if(isset($_POST['restore_all'])){
   $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        
        $query= "UPDATE mobile SET status='0' WHERE id IN ($extract_id)"; //2mean delete
        $query_run= mysqli_query($con,$query);
        
        if($query_run){
            $_SESSION['message'] ='Restored Successfully';
        header("location:".$url.'admin/mobile/trash');
                exit(0);
            
        }
        else{
            $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/trash');
                    exit(0);
        
        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/trash');
        exit(0);
   }
   
}    
if(isset($_POST['restore'])){
    $id=$_POST['restore'] ;
    $query= "UPDATE mobile SET status='0' WHERE id='$id'"; //2mean delete
    $query_run= mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] ='Restored successfully';
        header("location:".$url.'admin/mobile/trash');
            exit(0);
        
    }
    else{
        $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/trash');
            exit(0);

    }
}
if(isset($_POST['permanently_delete_all'])){
    $all_id = $_POST['select_item']??null;
   if($all_id !=NULL){

        $extract_id = implode(',',$all_id);
        $query= "DELETE FROM mobile WHERE id IN ($extract_id)";
        $query_run= mysqli_query($con,$query);

        if($query_run){
            $_SESSION['message'] ='Deleted successfully';
        header("location:".$url.'admin/mobile/trash');
                exit(0);

        }
        else{
            $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/trash');
                exit(0);

        }
   }
   else{
    $_SESSION['message'] ='Something Went Worng';
        header("location:".$url.'admin/mobile/trash');
        exit(0);
   }
}   





if(isset($_POST['permanently_delete'])){
    $id = $_POST['permanently_delete'];

    $check_image_query = "SELECT image FROM mobile WHERE id='$id'";
    $image_res = mysqli_query($con, $check_image_query);
    $res_data = mysqli_fetch_array($image_res);
    $image = $res_data["image"];
    $query= "DELETE FROM mobile WHERE id= '$id' LIMIT 1";
    $query_run= mysqli_query($con,$query);

    
   
    header("location:".$url.'admin/mobile/trash');
    exit(0);
    }
if(isset($_POST['empty'])){
   
    $query= "DELETE FROM mobile WHERE status='2'";
    $query_run= mysqli_query($con,$query);

    header("location:".$url.'admin/mobile/trash');
    exit(0);
    }



?>


    
