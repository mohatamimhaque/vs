<?php
include("../authentication.php");
$page_title="Laptop Add";
include("../includes/header.php");
include("../includes/navbar.php");
include("../message.php");

?>

<div class="container-fluid px -4" > 
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Add Laptop</h4> 
                    <a href="<?= base_url('admin/laptop/list') ?>" class="btn btn-danger float-end">back</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/laptop/code') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control" id="tags">
                            </div> 
                            <div class="col-md-4 mb-3">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image[]" multiple >
  </div>
  <div class="col-md-4 mb-3">
                                <label for="brand">brand</label>
                                <input type="text" placeholder="brand" name="brand" class="form-control" id="brand">
                            </div> 
  <div class="col-md-4 mb-3">
                                <label for="price">price</label>
                                <input type="text" placeholder="price" name="price" class="form-control" id="brand">
                            </div> 
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4" id="description"></textarea> 
                            </div>
                          </div>



                          <div class="row mt-4">
                            <div class="col-md-6">
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">General</h3>
                                <div class="d-flex mb-2">
                                  <label for="series" style="margin:auto 0;font-size:15px;width:200px;">Series</label>
                                  <input type='text' placeholder= 'Series' name='series' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='series'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="model" style="margin:auto 0;font-size:15px;width:200px;">Model</label>
                                    <input type='text' placeholder= 'Model' name='model' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='model'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="utility" style="margin:auto 0;font-size:15px;width:200px;">Utility</label>
                                    <input type='text' placeholder= 'Utility' name='utility' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='utility'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="device_type" style="margin:auto 0;font-size:15px;width:200px;">Device Type</label>
                                    <input type='text' placeholder= 'Device Type' name='device_type' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='device_type'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="os" style="margin:auto 0;font-size:15px;width:200px;">Os</label>
                                    <input type='text' placeholder= 'Os' name='os' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='os'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="dimensions" style="margin:auto 0;font-size:15px;width:200px;">Dimensions</label>
                                    <input type='text' placeholder= 'Dimensions' name='dimensions' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='dimensions'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="weight" style="margin:auto 0;font-size:15px;width:200px;">Weight</label>
                                    <input type='text' placeholder= 'Weight' name='weight' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='weight'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="warranty" style="margin:auto 0;font-size:15px;width:200px;">Warranty</label>
                                    <input type='text' placeholder= 'Warranty' name='warranty' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='warranty'>
                                </div>
                              </div>
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Display</h3>
                                <div class="d-flex mb-2">
                                    <label for="display_type" style="margin:auto 0;font-size:15px;width:200px;">Type</label>
                                    <input type='text' placeholder= 'Display Type' name='display_type' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='display_type'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="touch" style="margin:auto 0;font-size:15px;width:200px;">Touch</label>
                                    <input type='text' placeholder= 'Touch' name='touch' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='touch'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="size" style="margin:auto 0;font-size:15px;width:200px;">Size</label>
                                    <input type='text' placeholder= 'Size' name='size' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='size'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="resolution" style="margin:auto 0;font-size:15px;width:200px;">Resolution</label>
                                    <input type='text' placeholder= 'Resolution' name='resolution' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='resolution'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="ppi" style="margin:auto 0;font-size:15px;width:200px;">Ppi</label>
                                    <input type='text' placeholder= 'Ppi' name='ppi' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ppi'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="anti_glare_screen" style="margin:auto 0;font-size:15px;width:200px;">Anti Glare Screen</label>    
                                    <input type='text' placeholder= 'Anti Glare Screen' name='anti_glare_screen' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='anti_glare_screen'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="refresh_rate" style="margin:auto 0;font-size:15px;width:200px;">Refresh Rate</label>
                                    <input type='text' placeholder= 'Refresh Rate' name='refresh_rate' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='refresh_rate'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="features" style="margin:auto 0;font-size:15px;width:200px;">Features</label>
                                    <input type='text' placeholder= 'Features' name='features' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='features'>
                                </div>
                              </div>
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Connectivity</h3>
                                <div class="d-flex mb-2">
                                    <label for="ethernet" style="margin:auto 0;font-size:15px;width:200px;">Ethernet</label>
                                    <input type='text' placeholder= 'Ethernet' name='ethernet' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ethernet'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="wifi" style="margin:auto 0;font-size:15px;width:200px;">Wifi</label>
                                    <input type='text' placeholder= 'Wifi' name='wifi' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='wifi'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="bluetooth" style="margin:auto 0;font-size:15px;width:200px;">Bluetooth</label>
                                    <input type='text' placeholder= 'Bluetooth' name='bluetooth' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='bluetooth'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="usb_ports" style="margin:auto 0;font-size:15px;width:200px;">Usb Ports</label>
                                    <input type='text' placeholder= 'Usb Ports' name='usb_ports' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='usb_ports'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="hdmi" style="margin:auto 0;font-size:15px;width:200px;">Hdmi</label>
                                    <input type='text' placeholder= 'Hdmi' name='hdmi' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='hdmi'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="microphone" style="margin:auto 0;font-size:15px;width:200px;">Microphone</label>
                                    <input type='text' placeholder= 'Microphone' name='microphone' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='microphone'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="headphone_jack" style="margin:auto 0;font-size:15px;width:200px;">Headphone Jack</label>
                                    <input type='text' placeholder= 'Headphone Jack' name='headphone_jack' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='headphone_jack'>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Input</h3>
                                <div class="d-flex mb-2">
                                    <label for="security_lock_port" style="margin:auto 0;font-size:15px;width:200px;">Security Lock Port</label>  
                                    <input type='text' placeholder= 'Security Lock Port' name='security_lock_port' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='security_lock_port'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="fingerprint_sensor" style="margin:auto 0;font-size:15px;width:200px;">Fingerprint Sensor</label>  
                                    <input type='text' placeholder= 'Fingerprint Sensor' name='fingerprint_sensor' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='fingerprint_sensor'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="camera" style="margin:auto 0;font-size:15px;width:200px;">Camera</label>
                                    <input type='text' placeholder= 'Camera' name='camera' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='camera'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="keyboard" style="margin:auto 0;font-size:15px;width:200px;">Keyboard</label>
                                    <input type='text' placeholder= 'Keyboard' name='keyboard' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='keyboard'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="keyboard_backlit" style="margin:auto 0;font-size:15px;width:200px;">Keyboard Backlit</label>      
                                    <input type='text' placeholder= 'Keyboard Backlit' name='keyboard_backlit' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='keyboard_backlit'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="touchpad" style="margin:auto 0;font-size:15px;width:200px;">Touchpad</label>
                                    <input type='text' placeholder= 'Touchpad' name='touchpad' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='touchpad'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="inbuilt_microphone" style="margin:auto 0;font-size:15px;width:200px;">Inbuilt Microphone</label>  
                                    <input type='text' placeholder= 'Inbuilt Microphone' name='inbuilt_microphone' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='inbuilt_microphone'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="speakers" style="margin:auto 0;font-size:15px;width:200px;">Speakers</label>
                                    <input type='text' placeholder= 'Speakers' name='speakers' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='speakers'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="sound" style="margin:auto 0;font-size:15px;width:200px;">Sound</label>
                                    <input type='text' placeholder= 'Sound' name='sound' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='sound'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="optical_drive" style="margin:auto 0;font-size:15px;width:200px;">Optical Drive</label>
                                    <input type='text' placeholder= 'Optical Drive' name='optical_drive' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='optical_drive'>
                                </div>
                              </div>
                              
                            </div>
                            <div class="col-md-6">
                            <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Processor</h3>
                                <div class="d-flex mb-2">
                                    <label for="processor" style="margin:auto 0;font-size:15px;width:200px;">Processor</label>
                                    <input type='text' placeholder= 'Processor' name='processor' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='processor'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="speed" style="margin:auto 0;font-size:15px;width:200px;">Speed</label>
                                    <input type='text' placeholder= 'Speed' name='speed' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='speed'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="cache" style="margin:auto 0;font-size:15px;width:200px;">Cache</label>
                                    <input type='text' placeholder= 'Cache' name='cache' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='cache'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="processor_brand" style="margin:auto 0;font-size:15px;width:200px;">Brand</label>        
                                    <input type='text' placeholder= 'Processor Brand' name='processor_brand' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='processor_brand'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="processor_series" style="margin:auto 0;font-size:15px;width:200px;">Series</label>        
                                    <input type='text' placeholder= 'Processor Series' name='processor_series' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='processor_series'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="processor_model" style="margin:auto 0;font-size:15px;width:200px;">Model</label>        
                                    <input type='text' placeholder= 'Processor Model' name='processor_model' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='processor_model'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="generation" style="margin:auto 0;font-size:15px;width:200px;">Generation</label>
                                    <input type='text' placeholder= 'Generation' name='generation' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='generation'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="chipset" style="margin:auto 0;font-size:15px;width:200px;">Chipset</label>
                                    <input type='text' placeholder= 'Chipset' name='chipset' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='chipset'>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Graphices</h3>
                                <div class="d-flex mb-2">
                                    <label for="gpu" style="margin:auto 0;font-size:15px;width:200px;">Gpu</label>
                                    <input type='text' placeholder= 'Gpu' name='gpu' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='gpu'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="dedicated_memory" style="margin:auto 0;font-size:15px;width:200px;">Dedicated Memory</label>      
                                    <input type='text' placeholder= 'Dedicated Memory' name='dedicated_memory' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='dedicated_memory'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="gpu_brand" style="margin:auto 0;font-size:15px;width:200px;">Gpu Brand</label>
                                    <input type='text' placeholder= 'Gpu Brand' name='gpu_brand' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='gpu_brand'>
                                </div>
                              </div>
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Memory</h3>
                                <div class="d-flex mb-2">
                                    <label for="ram" style="margin:auto 0;font-size:15px;width:200px;">Ram</label>
                                    <input type='text' placeholder= 'Ram' name='ram' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ram'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="ram_type" style="margin:auto 0;font-size:15px;width:200px;">Ram Type</label>
                                    <input type='text' placeholder= 'Ram Type' name='ram_type' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ram_type'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="ram_bus_speed" style="margin:auto 0;font-size:15px;width:200px;">Ram Bus Speed</label>
                                    <input type='text' placeholder= 'Ram Bus Speed' name='ram_bus_speed' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ram_bus_speed'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="ram_slots" style="margin:auto 0;font-size:15px;width:200px;">Ram Slots</label>
                                    <input type='text' placeholder= 'Ram Slots' name='ram_slots' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ram_slots'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="expandable_memory" style="margin:auto 0;font-size:15px;width:200px;">Expandable Memory</label>    
                                    <input type='text' placeholder= 'Expandable Memory' name='expandable_memory' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='expandable_memory'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="hdd" style="margin:auto 0;font-size:15px;width:200px;">Hdd</label>
                                    <input type='text' placeholder= 'Hdd' name='hdd' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='hdd'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="ssd" style="margin:auto 0;font-size:15px;width:200px;">Ssd</label>
                                    <input type='text' placeholder= 'Ssd' name='ssd' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='ssd'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="extra_slot" style="margin:auto 0;font-size:15px;width:200px;">Extra Slot</label>
                                    <input type='text' placeholder= 'Extra Slot' name='extra_slot' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='extra_slot'>
                                </div>
                              </div>
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Battery</h3>
                                <div class="d-flex mb-2">
                                    <label for="battery" style="margin:auto 0;font-size:15px;width:200px;">Battery</label>
                                    <input type='text' placeholder= 'Battery' name='battery' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='battery'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="adapter_type" style="margin:auto 0;font-size:15px;width:200px;">Adapter Type</label>
                                    <input type='text' placeholder= 'Adapter Type' name='adapter_type' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='adapter_type'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="battery_backup" style="margin:auto 0;font-size:15px;width:200px;">Battery Backup</label>
                                    <input type='text' placeholder= 'Battery Backup' name='battery_backup' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='battery_backup'>
                                </div>
                              </div>
                              <div class="mb-4">
                                <h3 class="mb-3" style="font-size:35px;color:rgb(230,230,220)">Extra</h3>
                                <div class="d-flex mb-2">
                                    <label for="included_software" style="margin:auto 0;font-size:15px;width:200px;">Included Software</label>    
                                    <input type='text' placeholder= 'Included Software' name='included_software' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='included_software'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="sales_package" style="margin:auto 0;font-size:15px;width:200px;">Sales Package</label>
                                    <input type='text' placeholder= 'Sales Package' name='sales_package' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='sales_package'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="others_features" style="margin:auto 0;font-size:15px;width:200px;">Others Features</label>        
                                    <input type='text' placeholder= 'Others Features' name='others_features' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='others_features'>
                                </div>
                                <div class="d-flex mb-2">
                                    <label for="extra" style="margin:auto 0;font-size:15px;width:200px;">Extra</label>
                                    <input type='text' placeholder= 'Extra' name='extra' style="margin:auto 0;font-size:17px;width:250px;overflow:hidden" class='form-control' id='extra'>
                                </div>
                              </div>
                            </div>
                          </div>




                            <div class="col-md-12 mb-3 d-flex">
                                <button type="submit" name="add" class="btn btn-primary mr-3">Publish</button>
                                <button type="submit" name="draft" class="btn btn-info">Draft</button>
                            </div>
                      


                        
                    </form>
                </div>
            </div>
        </div>
    <div>
<div>




<?php 
include("../includes/footer.php");
?>



