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
    else if($array_list[0] == 'device_type'){
        $type=array();
        foreach($array_list as $aa){
                if($aa != 'device_type'){
                    $type[]=$aa;
                }
            }
            ?>
            <script>
                var typeArray = <?php echo json_encode($type); ?>;
                for (let i = 0; i < typeArray.length; i++) {
                    var item = typeArray[i]; 
                    const nodeList = document.querySelectorAll(".device_type");
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
    else if($array_list[0] == 'utility'){
        $utility=array();
        foreach($array_list as $aa){
                if($aa != 'utility'){
                    $utility[]=$aa;
                }
            }
            ?>
            <script>
                var utilityArray = <?php echo json_encode($utility); ?>;
                for (let i = 0; i < utilityArray.length; i++) {
                    var item = utilityArray[i]; 
                    const nodeList = document.querySelectorAll(".utility_item");
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
    else if($array_list[0] == 'screen_size'){
        $screen_size=array();
        foreach($array_list as $aa){
                if($aa != 'screen_size'){
                    $screen_size[]=$aa;
                }
            }
            ?>
            <script>
                var screen_sizeArray = <?php echo json_encode($screen_size); ?>;
                for (let i = 0; i < screen_sizeArray.length; i++) {
                    var item = screen_sizeArray[i]; 
                    const nodeList = document.querySelectorAll(".screen_size_item");
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
         
    else if($array_list[0] == 'resolution'){
        $resolution=array();
        foreach($array_list as $aa){
                if($aa != 'resolution'){
                    $resolution[]=$aa;
                }
            }
            ?>
            <script>
                var resolutionArray = <?php echo json_encode($resolution); ?>;
                for (let i = 0; i < resolutionArray.length; i++) {
                    var item = resolutionArray[i]; 
                    const nodeList = document.querySelectorAll(".resolution_item");
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
         
    else if($array_list[0] == 'cpu_brand'){
        $cpu_brand=array();
        foreach($array_list as $aa){
                if($aa != 'cpu_brand'){
                    $cpu_brand[]=$aa;
                }
            }
            ?>
            <script>
                var cpu_brandArray = <?php echo json_encode($cpu_brand); ?>;
                for (let i = 0; i < cpu_brandArray.length; i++) {
                    var item = cpu_brandArray[i]; 
                    const nodeList = document.querySelectorAll(".cpu_brand_item");
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
    else if($array_list[0] == 'cpu_model'){
        $cpu_model=array();
        foreach($array_list as $aa){
                if($aa != 'cpu_model'){
                    $cpu_model[]=$aa;
                }
            }
            ?>
            <script>
                var cpu_modelArray = <?php echo json_encode($cpu_model); ?>;
                for (let i = 0; i < cpu_modelArray.length; i++) {
                    var item = cpu_modelArray[i]; 
                    const nodeList = document.querySelectorAll(".cpu_model_item");
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
    else if($array_list[0] == 'cpu_core'){
        $cpu_core=array();
        foreach($array_list as $aa){
                if($aa != 'cpu_core'){
                    $cpu_core[]=$aa;
                }
            }
            ?>
            <script>
                var cpu_coreArray = <?php echo json_encode($cpu_core); ?>;
                for (let i = 0; i < cpu_coreArray.length; i++) {
                    var item = cpu_coreArray[i]; 
                    const nodeList = document.querySelectorAll(".cpu_core_item");
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
         
    else if($array_list[0] == 'cache_memory'){
        $cache=array();
        foreach($array_list as $aa){
                if($aa != 'cache_memory'){
                    $cache[]=$aa;
                }
            }
            ?>
            <script>
                var cacheArray = <?php echo json_encode($cache); ?>;
                for (let i = 0; i < cacheArray.length; i++) {
                    var item = cacheArray[i]; 
                    const nodeList = document.querySelectorAll(".cache_item");
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
                    $ram[]=$aa;
                }
            }
            ?>
            <script>
                var ramArray = <?php echo json_encode($ram); ?>;
                for (let i = 0; i < ramArray.length; i++) {
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
    else if($array_list[0] == 'ram_type'){
        $ram_type=array();
        foreach($array_list as $aa){
                if($aa != 'ram_type'){
                    $ram_type[]=$aa;
                }
            }
            ?>
            <script>
                var ram_typeArray = <?php echo json_encode($ram_type); ?>;
                for (let i = 0; i < ram_typeArray.length; i++) {
                    var item = ram_typeArray[i]; 
                    const nodeList = document.querySelectorAll(".ram_type_item");
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
    else if($array_list[0] == 'hdd'){
        $hdd=array();
        foreach($array_list as $aa){
                if($aa != 'hdd'){
                    $hdd[]=$aa;
                }
            }
            ?>
            <script>
                var hddArray = <?php echo json_encode($hdd); ?>;
                for (let i = 0; i < hddArray.length; i++) {
                    var item = hddArray[i]; 
                    const nodeList = document.querySelectorAll(".hdd_item");
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
    else if($array_list[0] == 'ssd'){
        $ssd=array();
        foreach($array_list as $aa){
                if($aa != 'ssd'){
                    $ssd[]=$aa;
                }
            }
            ?>
            <script>
                var ssdArray = <?php echo json_encode($ssd); ?>;
                for (let i = 0; i < ssdArray.length; i++) {
                    var item = ssdArray[i]; 
                    const nodeList = document.querySelectorAll(".ssd_item");
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
    else if($array_list[0] == 'hdd'){
        $hdd=array();
        foreach($array_list as $aa){
                if($aa != 'hdd'){
                    $hdd[]=$aa;
                }
            }
            ?>
            <script>
                var hddArray = <?php echo json_encode($hdd); ?>;
                for (let i = 0; i < hddArray.length; i++) {
                    var item = hddArray[i]; 
                    const nodeList = document.querySelectorAll(".hdd_item");
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
    else if($array_list[0] == 'graphics'){
        $graphics=array();
        foreach($array_list as $aa){
                if($aa != 'graphics'){
                    $graphics[]=$aa;
                }
            }
            ?>
            <script>
                var graphicsArray = <?php echo json_encode($graphics); ?>;
                for (let i = 0; i < graphicsArray.length; i++) {
                    var item = graphicsArray[i]; 
                    const nodeList = document.querySelectorAll(".graphics_item");
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
    else if($array_list[0] == 'os'){
        $os=array();
        foreach($array_list as $aa){
                if($aa != 'os'){
                    $os[]=$aa;
                }
            }
            ?>
            <script>
                var osArray = <?php echo json_encode($os); ?>;
                for (let i = 0; i < osArray.length; i++) {
                    var item = osArray[i]; 
                    const nodeList = document.querySelectorAll(".os_item");
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