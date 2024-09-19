<?php
if(isset($_GET['query'])){
    $title = $_GET['query'];


$title_array = explode('/', $title);
foreach($title_array as $rr){
    $array_list = explode('-', $rr);
    if($array_list[0] == 'brand'){
        $brand=array();
        foreach($array_list as $aa){
                if($aa != 'brand'){
                    $brand[]=$aa;
            
                }
            }
            ?>
                <script>
                    var brandArray = <?php echo json_encode($brand); ?>;
                    for (let i = 0; i < brandArray.length; i++) {
                        var item = brandArray[i]; 
                        const nodeList = document.querySelectorAll(".brand_item");
                        for (let i = 0; i < nodeList.length; i++) {
                            var input =nodeList[i]; 
                            var value = input.value.toLowerCase();
                            if(value == item){
                                input.checked = true;
                            }
                        }
                    }
                </script>
            <?php
        }       
    else if($array_list[0] == 'type'){
        $type=array();
        foreach($array_list as $aa){
                if($aa != 'type'){
                    $type[]=$aa;
                }
            }
            ?>
            <script>
                var typeArray = <?php echo json_encode($type); ?>;
                for (let i = 0; i < typeArray.length; i++) {
                    var item = typeArray[i]; 
                    const nodeList = document.querySelectorAll(".device_type_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
        <?php


        }       
    else if($array_list[0] == 'connectivity'){
        $connectivity=array();
        foreach($array_list as $aa){
                if($aa != 'connectivity'){
                    $connectivity[]=$aa;
                }
            }
           
            ?>
            <script>
                var connectivityArray = <?php echo json_encode($connectivity); ?>;
                for (let i = 0; i <connectivityArray.length; i++) {
                    var item = connectivityArray[i]; 
                    const nodeList = document.querySelectorAll(".connectivity_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
        <?php

        }       
    else if($array_list[0] == 'feature'){
        $feature=array();
        foreach($array_list as $aa){
                if($aa != 'feature'){
                    $feature[]=$aa;
                }
            }
            ?>
            <script>
                var featureArray = <?php echo json_encode($feature); ?>;
                for (let i = 0; i <featureArray.length; i++) {
                    var item = featureArray[i]; 
                    const nodeList = document.querySelectorAll(".feature_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
        <?php
            

        }       
    else if($array_list[0] == 'camera'){
        $camera=array();
        foreach($array_list as $aa){
                if($aa != 'camera'){
                    $camera[]=$aa;
                }
            }
 ?>
            <script>
                var cameraArray = <?php echo json_encode($camera); ?>;
                for (let i = 0; i <cameraArray.length; i++) {
                    var item = cameraArray[i]; 
                    const nodeList = document.querySelectorAll(".camera_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
        <?php
            
        }       
    else if($array_list[0] == 'ram'){
        $ram=array();
        foreach($array_list as $aa){
                if($aa != 'ram'){
                    $ram[] =filter_var($aa, FILTER_SANITIZE_NUMBER_INT);  
                }
            }
            ?>
             <script>
                var ramArray = <?php echo json_encode($ram); ?>;
                for (let i = 0; i <ramArray.length; i++) {
                    var item = ramArray[i]; 
                    const nodeList = document.querySelectorAll(".ram_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
            <?php
        }       
    else if($array_list[0] == 'storage'){
        $storage=array();
        foreach($array_list as $aa){
                if($aa != 'storage'){
                    $storage[]=filter_var($aa, FILTER_SANITIZE_NUMBER_INT);
                }
            }
            ?>
             <script>
                var storageArray = <?php echo json_encode($storage); ?>;
                for (let i = 0; i <storageArray.length; i++) {
                    var item = storageArray[i]; 
                    const nodeList = document.querySelectorAll(".memory_item");
                    for (let i = 0; i < nodeList.length; i++) {
                        var input =nodeList[i]; 
                        var value = input.value.toLowerCase();
                        if(value == item){
                            input.checked = true;
                        }
                    }
                }
            </script>
            <?php
        }
  
        else if($array_list[0] == 'criteria'){
            $criteria=array();
            foreach($array_list as $aa){
                    if($aa != 'criteria'){
                        $criteria[]=$aa;
                    }
                }
                ?>
                <script>
                var criteriaArray = <?php echo json_encode($criteria); ?>;
                var item = criteriaArray[0].replace(/_/g, ' ');
                var text = document.getElementById('criteria') ;
                text.value=item;
                var check = document.getElementById('criteria_result') ;
                check.value=item;
                check.checked=true;

                
            </script>
                <?php
        }
        else if($array_list[0] == 'price'){
            $price=array();
            foreach($array_list as $aa){
                    if($aa != 'price'){
                        $price[]=$aa;
                    }
                }
               
        }
    
            }
        }
 
?>

<script>
/*
const nodeList = document.querySelectorAll(".brand_item");
for (let i = 0; i < nodeList.length; i++) {
    var input =nodeList[i]; 
    var value = input.value.toLowerCase();
    if(value != 'Realme'){
        input.checked = true;
      }
    }
 
*/
</script>