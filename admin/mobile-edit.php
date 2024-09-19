<?php
include("authentication.php");
$page_title="Edit Mobile";

include("includes/header.php");
include("includes/navbar.php");
include("message.php");
if(isset($_GET["id"])){
    $id = $_GET['id'];
    $edit= "SELECT * FROM mobile WHERE id='$id'";
    $run = mysqli_query($con,$edit);
    if(mysqli_num_rows($run) > 0){
        $row=mysqli_fetch_array($run);
                    
?>


<div class="container-fluid px -4" > 
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Mobile edit</h4> 
                    <a href="<?= base_url('admin/mobile/list') ?>" class="btn btn-danger float-end">back</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/code/mobile') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= $row['name'] ?>">
                            </div> 
                            <div class="col-md-6 mb-3">
                              <input type="hidden" name="old_image" value="<?=$row['image'] ?>">
                              <label for="image">Image</label>
                              
                              <input type="file" class="form-control" id="image" name="image" multiple >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" value="<?= $row['tags'] ?>" name="tags" class="form-control" id="tags" >
                            </div> 
                            <div class="col-md-3 mb-3">
                                <label for="brand">brand</label>
                                <input type="text" value="<?= $row['brand'] ?>" name="brand" class="form-control" id="brand" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="brand">price</label>
                                <input type="text" value="<?= $row['price'] ?>" name="price" class="form-control" id="price" >
                            </div>
                            
                            
                           
                               
                             
                            
                      
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea  name="description" class="form-control" rows="4" id="description"><?= $row['description'] ?></textarea> 
                            </div>
                           
    </div>




                           
                       <div class="row mobile">
                        <div class="col-md-6 col-lg-6">
                          <div>
                            <h3>Generel</h3>
                          <div class="specification">
                            <div class="specification-row">
                            <label for="sim_type" class="specification-child">Sim type</label>
                              <div class="specification-child">
                                <input type='text' value="<?= $row['sim_type'] ?>" placeholder= 'sim type' name='sim_type' class='sim_type' id='sim_type'>
                          
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="dual_sim" class="specification-child">dual sim</label>
                              <div class="specification-child">
                                <input type='checkbox' <?= $row['dual_sim'] == "1" ? "checked":'' ?> name='dual_sim' class='dual_sim' id='dual_sim'>
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="sim_size" class="specification-child">sim size</label>
                              <div class="specification-child">
                                <select name="sim_size" class='sim_size' id='sim_size'>
                                  <option value="<?= $row['sim_size'] ?>"><?= $row['sim_size'] ?></option>
                                  <option value="Standard">Standard</option>
                                  <option value="Mini">Mini</option>
                                  <option value="Macro">Macro</option>
                                  <option value="Nano">Nano</option>
                                  <option value="E-sim">E-sim</option>
                                </select>
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="device_type" class="specification-child">device type</label>
                              <div class="specification-child">
                                <select value="" name="device_type" class='device_type' id='device_type'>
                                  <option value="<?= $row['device_type'] ?>"><?= $row['device_type'] ?></option>
                                  <option value="Smartphone">Smartphone</option>
                                  <option value="Feature Phone">Feature Phone</option>
                                </select>
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="release_date" class="specification-child">release date</label>
                              <div class="specification-child">
                                <input type='text' value="<?= $row['release_date'] ?>" placeholder= 'release date' name='release_date' class='release_date' id='release_date'>
                              </div>
                            </div>
                          </div>
                          </div>
                      
                      
                      
                          <div>
                              <h3>Design</h3>
                              <div class="specification">
                                  <div class="specification-row">
                                  <label for="dimensions" class="specification-child">dimensions</label>
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['dimensions'] ?>" placeholder= 'dimensions' name='dimensions' class='dimensions' id='dimensions'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="wieght" class="specification-child">wieght</label>
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['wieght'] ?>" placeholder= 'weight' name='wieght' class='wieght' id='wieght'>
                                    </div>
                                  </div>
                              
                              </div>
                          </div>
                      
                      
                      
                          <div>
                              <h3>display</h3>
                              <div class="specification">
                                  <div class="specification-row">
                                  <label for="display_type" class="specification-child">display type</label>
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['display_type'] ?>" placeholder="type" name='display_type' class='display_type' id='display_type'>
                                    </div>
                      
                                  </div>
                                  <div class="specification-row">
                                  <label for="touch" class="specification-child">touch</label>
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['touch'] == "1" ? "checked":'' ?> name='touch' class='touch' id='touch'>
                                      <input type='text' value="<?= $row['touch_details'] ?>" placeholder= 'touch' name='touch_details' class='touch_details' id='touch_details'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                            <label for="refresh_rate" class="specification-child">refresh rate</label> 
                              <div class="specification-child">
                                <select name="refresh_rate" class='refresh_rate' id='refresh_rate'>
                                  <option value="<?= $row['refresh_rate'] ?>"><?= $row['refresh_rate'] ?></option>
                                  <option value="60hz">60hz</option>
                                  <option value="75hz">75hz</option>
                                  <option value="90hz">90hz</option>
                                  <option value="120hz">120hz</option>
                                  <option value="150hz">150hz</option>
                                </select>
                              </div>
                            </div>
                                  <div class="specification-row">
                                  <label for="size" class="specification-child">size</label>
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['size'] ?>" placeholder= 'size' name='size' class='size' id='size'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="aspect_raito" class="specification-child">aspect raito</label>
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['aspect_raito'] ?>" placeholder='aspect ratio' name='aspect_raito' class='aspect_raito' id='aspect_raito'>
                                    </div>
                                    
                                  </div>
                                  <div class="specification-row">
                                  <label for="ppi" class="specification-child">ppi</label> 
                                    <div class="specification-child">
                                      <input type='text'  value="<?= $row['ppi'] ?>"  placeholder= 'ppi' name='ppi' class='ppi' id='ppi'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="sb_ratio" class="specification-child">sb ratio</label> 
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['sb_ratio'] ?>" placeholder= 'Screen to Body Ratio' name='sb_ratio' class='sb_ratio' id='sb_ratio'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="glass_type" class="specification-child">glass type</label> 
                                    <div class="specification-child">
                                      <input type='text'  value="<?= $row['glass_type'] ?>" placeholder= 'Glass Type' name='glass_type' class='glass_type' id='glass_type'>
                                    </div>
                                  </div>
                               


                                  <div class="specification-row">
                                  <label for="notch" class="specification-child">notch</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['notch'] == "1" ? "checked":'' ?> name='notch' class='notch m' id='notch'>
                                      <input type='text'  value="<?= $row['notch_details'] ?>" placeholder= 'Notch' name='notch_details' class='notch_details' id='notch_details'>
                                    </div>
                                  </div>
                                  
                             </div>
                      </div>
                          <div>
                              <h3>Memory</h3>
                              <div class="specification">
                                <div class="specification-row">
                                <label for="ram" class="specification-child">ram</label> 
                                  <div class="specification-child">
                                    <input type='text'  value="<?= $row['ram'] ?>" placeholder= 'RAM' name='ram' class='ram' id='ram'>
                                  </div>
                                </div>
                                <div class="specification-row">
                                <label for="storage" class="specification-child">storage</label> 
                                  <div class="specification-child">
                                    <input type='text'  value="<?= $row['storage'] ?>" placeholder= 'Storage' name='storage' class='storage' id='storage'>
                                  </div>
                                </div>
                                <div class="specification-row">
                                <label for="card_slot" class="specification-child">card slot</label> 
                                  <div class="specification-child aaa">
                                    <input type='checkbox' <?= $row['card_slot'] == "1" ? "checked":'' ?> name='card_slot' class='card_slot' id='card_slot'>
                                    <input type='text'  value="<?= $row['card_slot_details'] ?>" placeholder= 'Card Slot' name='card_slot_details' class='card_slot_details' id='card_slot_details'>
                                  </div>
                                </div>
                              
                              </div>
                          </div>
                      
                          <div>
                              <h3>Connectivity</h3>
                              <div class="specification">
                                  <div class="specification-row">
                                  <label for="gprs" class="specification-child">gprs</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' <?= $row['gprs'] == "1" ? "checked":'' ?> name='gprs' class='gprs' id='gprs'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="edge" class="specification-child">edge</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' <?= $row['edge'] == "1" ? "checked":'' ?> name='edge' class='edge' id='edge'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="3g" class="specification-child">3g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' <?= $row['3g'] == "1" ? "checked":'' ?> name='3g' class='3g' id='3g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="4g" class="specification-child">4g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' <?= $row['4g'] == "1" ? "checked":'' ?> name='4g' class='4g' id='4g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="5g" class="specification-child">5g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' <?= $row['5g'] == "1" ? "checked":'' ?> name='5g' class='5g' id='5g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="volte" class="specification-child">volte</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['volte'] == "1" ? "checked":'' ?> name='volte' class='volte' id='volte'>
                                      <input type='text'  value="<?= $row['volte_details'] ?>" placeholder= 'VoLte' name='volte_details' class='volte_details' id='volte_details'>
                      
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="wifi" class="specification-child">wifi</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['wifi'] == "1" ? "checked":'' ?> name='wifi' class='wifi' id='wifi'>
                                      <input type='text'  value="<?= $row['wifi_details'] ?>" placeholder= 'wifi' name='wifi_details' class='wifi_details' id='wifi_details'>
                                      </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="blutooth" class="specification-child">blutooth</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['blutooth'] == "1" ? "checked":'' ?> name='blutooth' class='blutooth' id='blutooth'>
                      <input type='text' placeholder= 'blutooth' value="<?= $row['blutooth_details'] ?>" name='blutooth_details' class='blutooth_details' id='blutooth_details'>
                      </div>
                                    </div>
                                  
                                  <div class="specification-row">
                                  <label for="usb" class="specification-child">usb</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' <?= $row['usb'] == "1" ? "checked":'' ?> name='usb' class='usb' id='usb'>
                      <input type='text' value="<?= $row['usb_details'] ?>" placeholder= 'usb' name='usb_details' class='usb_details' id='usb_details'>
                      </div>
                                    </div>
                                  
                                  <div class="specification-row">
                                  <label for="usb_feature" class="specification-child">usb feature</label> 
                                    <div class="specification-child">
                                      <input type='text' value="<?= $row['usb_feature'] ?>" placeholder= 'usb features' name='usb_feature' class='usb_feature' id='usb_feature'>
                                    </div>
                                  </div>
                              </div>
                              </div>
                              </div>
                       
                      
                     
                      
                      
                      
                      
                       <div class="col-md-6 col-lg-6">
                      
                          <div>
                            <h3>Extra</h3>
                          <div class="specification">
                            <div class="specification-row">
                            <label for="gps" class="specification-child">gps</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['gps'] == "1" ? "checked":'' ?> name='gps' class='gps' id='gps'>
                                <input type='text' value="<?= $row['gps_details'] ?>" placeholder= 'gps' name='gps_details' class='gps_details' id='gps_details'>
                                
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="fingerprint" class="specification-child">fingerprint</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['fingerprint'] == "1" ? "checked":'' ?> name='fingerprint' class='fingerprint' id='fingerprint'>
                      <input type='text' value="<?= $row['fingerprint_details'] ?>" placeholder= 'fingerprint' name='fingerprint_details' class='fingerprint_details' id='fingerprint_details'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="face_unlock" class="specification-child">face unlock</label> 
                              <div class="specification-child">
                                <input type='checkbox' <?= $row['face_unlock'] == "1" ? "checked":'' ?> name='face_unlock' class='face_unlock' id='face_unlock'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="sensors" class="specification-child">sensors</label> 
                              <div class="specification-child">
                                <input type='text' value="<?= $row['sensors'] ?>" placeholder= 'sensors' name='sensors' class='sensors' id='sensors'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="headphone_jack" class="specification-child">headphone jack</label> 
                              <div class="specification-child">
                                <input type='checkbox' <?= $row['headphone_jack'] == "1" ? "checked":'' ?>  name='headphone_jack' class='headphone_jack' id='headphone_jack'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="extra" class="specification-child">extra</label> 
                              <div class="specification-child">
                                <input type='text' value="<?= $row['extra'] ?>" placeholder= 'extra' name='extra' class='extra' id='extra'>
                      
                              </div>
                            </div>
                           </div>
                           </div>
                          
                            
                         
                            <h3>Camera</h3>
                          <div class="specification">
                            <div class="specification-row">
                            <label for="rear_camera" class="specification-child">rear camera</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['rear_camera'] == "1" ? "checked":'' ?> name='rear_camera' class='rear_camera' id='rear_camera'>
                                <textarea style="border: 1px solid var(--black);
  padding:2px 5px;border-radius: 4px;background-color: transparent;box-shadow:inset 0 0 2px var(--black);color:var(--black);width:100%;"  name="rear_camera_details" class='textarea' id="rear_camera_details"rows="1"><?= $row['rear_camera_details'] ?></textarea>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="feature" class="specification-child">feature</label> 
                              <div class="specification-child">
                                <input type='text' value="<?= $row['feature'] ?>" placeholder= 'features' name='feature' class='feature' id='feature'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="video_recording" class="specification-child">video recording</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['video_recording'] == "1" ? "checked":'' ?> name='video_recording' class='video_recording' id='video_recording'>
                      <input type='text' value="<?= $row['video_recording_details'] ?>" placeholder= 'video recording' name='video_recording_details' class='video_recording_details' id='video_recording_details'>   
                      </div>
                              </div>
                            
                            <div class="specification-row">
                            <label for="flash" class="specification-child">flash</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['flash'] == "1" ? "checked":'' ?> name='flash' class='flash' id='flash'>
                      <input type='text' value="<?= $row['flash_type'] ?>" placeholder= 'flash' name='flash_type' class='flash_type' id='flash_type'>
                      </div>
                              </div>
                            
                            <div class="specification-row">
                            <label for="front_camera" class="specification-child">front camera</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['front_camera'] == "1" ? "checked":'' ?> name='front_camera' class='front_camera' id='front_camera'>
                      <input type='text' value="<?= $row['front_camera_details'] ?>" placeholder= 'front camera' name='front_camera_details' class='front_camera_details' id='front_camera_details'>
                      </div>
                              </div>

                            
                            <div class="specification-row">
                            <label for="front_camera_video" class="specification-child">front camera video</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' <?= $row['front_camera_video'] == "1" ? "checked":'' ?> name='front_camera_video' class='front_camera_video' id='front_camera_video'>
                      <input type='text' value="<?= $row['front_camera_video_details'] ?>" placeholder= 'front video recording' name='front_camera_video_details' class='front_camera_video_details' id='front_camera_video_details'>
                      
                              </div>
                            </div>
                      </div>
                  
                      
                     
                      
                      
                            <div>
                              <h3>Technical</h3>
                            <div class="specification">
                              <div class="specification-row">
                              <label for="os" class="specification-child">os</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['os'] ?>" placeholder= 'operating system' name='os' class='os' id='os'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="chipset" class="specification-child">chipset</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['chipset'] ?>" placeholder= 'chipset' name='chipset' class='chipset' id='chipset'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="cpu" class="specification-child">cpu</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['cpu'] ?>" placeholder= 'cpu' name='cpu' class='cpu' id='cpu'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                                <label for="core_details" class="specification-child">Core Details</label>
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['core_details'] ?>" placeholder= 'core details' name='core_details' class='core_details' id='core_details'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="gpu" class="specification-child">gpu</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['gpu'] ?>" placeholder= 'gpu' name='gpu' class='gpu' id='gpu'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="java" class="specification-child">java</label> 
                                <div class="specification-child">
                                  <input type='checkbox' <?= $row['java'] == "1" ? "checked":'' ?> name='java' class='java' id='java'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="browser" class="specification-child">browser</label> 
                                <div class="specification-child">
                                  <input type='checkbox' <?= $row['browser'] == "1" ? "checked":'' ?> name='browser' class='browser' id='browser'>
                      
                                </div>
                              </div>
                             
                              
                            </div>
                            </div>
                      
                      
                      
                      
                            <div>
                              <h3>Multimedia</h3>
                            <div class="specification">
                              <div class="specification-row">
                              <label for="email" class="specification-child">email</label> 
                                <div class="specification-child">
                                  <input type='checkbox' <?= $row['email'] == "1" ? "checked":'' ?> name='email' class='email' id='email'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="music" class="specification-child">music</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' <?= $row['music'] == "1" ? "checked":'' ?> name='music' class='music' id='music'>
                      <input type='text' value="<?= $row['music_type'] ?>" placeholder= 'music' name='music_type' class='music_type' id='music_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="video" class="specification-child">video</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' <?= $row['video'] == "1" ? "checked":'' ?> name='video' class='video' id='video'>
                      <input type='text' value="<?= $row['video_type'] ?>" placeholder= 'video' name='video_type' class='video_type' id='video_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="fm_radio" class="specification-child">fm radio</label> 
                                <div class="specification-child">
                                  <input type='checkbox' <?= $row['fm_radio'] == "1" ? "checked":'' ?> name='fm_radio' class='fm_radio' id='fm_radio'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="document_reader" class="specification-child">document reader</label> 
                                <div class="specification-child">
                                  <input type='checkbox' <?= $row['document_reader'] == "1" ? "checked":'' ?> name='document_reader' class='document_reader' id='document_reader'>
                                </div>
                              </div>
                              
                            </div>
                            </div>
                           
                              <h3>Battery Type</h3>
                            <div class="specification">
                              <div class="specification-row">
                              <label for="battery_type" class="specification-child">battery type</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['battery_type'] ?>" placeholder= 'type' name='battery_type' class='battery_type' id='battery_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="battery_size" class="specification-child">battery size</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['battery_size'] ?>" placeholder= 'size' name='battery_size' class='battery_size' id='battery_size'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="fast_charging" class="specification-child">fast charging</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' <?= $row['fast_charging'] == "1" ? "checked":'' ?> name='fast_charging' class='fast_charging' id='fast_charging'>
                      <input type='text' value="<?= $row['fast_charging_details'] ?>" placeholder= 'fast charging' name='fast_charging_details' class='fast_charging_details' id='fast_charging_details'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="talk_time" class="specification-child">talk time</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['talk_time'] ?>"  placeholder= 'talk time' name='talk_time' class='talk_time' id='talk_time'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="playback_time" class="specification-child">playback time</label> 
                                <div class="specification-child">
                                  <input type='text' value="<?= $row['playback_time'] ?>" placeholder= 'music playbacktime' name='playback_time' class='playback_time' id='playback_time'>
                                </div>
                              </div>
                              
                           
                      
                      
                      
                      </div> 
                      </div>
              





                        </div>








                            <div class="col-md-12 mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    <div>
<div>




<?php 
}}
include("includes/footer.php")
?>



