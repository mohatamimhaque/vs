<?php
<?php 



    $targetDir = "uploads/"; 
    $fileFormat = array('jpg','png','jpeg','gif'); 
     
    $displayMessage = $messageErr = $storeMembersInfo = $profileImgErrStore = $profileImgErrStoreType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 

            $fileName = basename($_FILES['files']['name'][$key]); 
            $basePath = $targetDir . $fileName; 
             

            $fileType = pathinfo($basePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $fileFormat)){ 

                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $basePath)){ 

                    $storeMembersInfo .= "('".$fileName."', NOW()),"; 
                }else{ 
                    $profileImgErrStore .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $profileImgErrStoreType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
 
        $profileImgErrStore = !empty($profileImgErrStore)?'Upload Error: '.trim($profileImgErrStore, ' | '):''; 
        $profileImgErrStoreType = !empty($profileImgErrStoreType)?'File Type Error: '.trim($profileImgErrStoreType, ' | '):''; 
        $messageErr = !empty($profileImgErrStore)?'<br/>'.$profileImgErrStore.'<br/>'.$profileImgErrStoreType:'<br/>'.$profileImgErrStoreType; 
         
        if(!empty($storeMembersInfo)){ 
            $storeMembersInfo = trim($storeMembersInfo, ','); 

            $insert = $link->query("INSERT INTO members (file_name, uploaded_on) VALUES $storeMembersInfo"); 
            if($insert){ 
                $displayMessage = "Good Luck, Files are uploaded successfully.".$messageErr; 
            }else{ 
                $displayMessage = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $displayMessage = "Upload failed! ".$messageErr; 
        } 
    }else{ 
        $displayMessage = 'Please select a file to upload.'; 
    } 
} 
 
?>



?>