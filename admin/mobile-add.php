<?php
include("authentication.php");
$page_title="Mobile Add";
include("includes/header.php");
include("includes/navbar.php");
include("message.php");

?>

<div class="container-fluid px -4" > 
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Add Mobile</h4> 
                    <a href="<?= base_url('admin/mobile/list') ?>" class="btn btn-danger float-end">back</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/code/mobile') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control" id="tags" required>
                            </div> 
                            <div class="col-md-4 mb-3">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image[]" multiple required>
  </div>
  <div class="col-md-4 mb-3">
                                <label for="brand">brand</label>
                                <input type="text" placeholder="brand" name="brand" class="form-control" id="brand" required>
                            </div> 
  <div class="col-md-4 mb-3">
                                <label for="price">price</label>
                                <input type="text" placeholder="price" name="price" class="form-control" id="brand" required>
                            </div> 
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4" id="description"></textarea> 
                            </div>
                           





                           
                       <div class="row mobile">
                        <div class="col-md-6 col-lg-6">
                          <div>
                            <h3>Generel</h3>
                          <div class="specification">
                            <div class="specification-row">
                              <label for="sim_type" class="specification-child">sim type</label>
                              <div class="specification-child">
                                <input type='text' placeholder= 'sim type' name='sim_type' class='sim_type' id='sim_type'>
                          
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="dual_sim" class="specification-child">dual sim</label> 
                              <div class="specification-child">
                                <input type='checkbox' name='dual_sim' class='dual_sim' id='dual_sim'>
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="sim_size" class="specification-child">sim size</label> 
                              <div class="specification-child">
                                <select name="sim_size" class='sim_size' id='sim_size'>
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
                                <select name="device_type" class='device_type' id='device_type'>
                                  <option value="Smartphone">Smartphone</option>
                                  <option value="Feature Phone">Feature Phone</option>
                                </select>
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="release_date" class="specification-child">release date</label> 

                              <div class="specification-child">
                                <input type='text' placeholder= 'release date' name='release_date' class='release_date' id='release_date'>
                              </div>
                            </div>
                          </div>
                          </div>
                      
                      
                      
                          <div>
                              <h3>Degin</h3>
                              <div class="specification">
                                  <div class="specification-row">
                                  <label for="dimensions" class="specification-child">dimensions</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'dimensions' name='dimensions' class='dimensions' id='dimensions'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="wieght" class="specification-child">wieght</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'weight' name='wieght' class='wieght' id='wieght'>
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
                                      <input type='text' placeholder="type" name='display_type' class='display_type' id='display_type'>
                                    </div>
                      
                                  </div>
                                  <div class="specification-row">
                                  <label for="touch" class="specification-child">touch</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='touch' class='touch' id='touch'>
                                      <input type='text' placeholder= 'touch' name='touch_details' class='touch_details' id='touch_details'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                            <label for="refresh_rate" class="specification-child">refresh rate</label> 
                              <div class="specification-child">
                                <select name="refresh_rate" class='refresh_rate' id='refresh_rate'>
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
                                      <input type='text' placeholder= 'size' name='size' class='size' id='size'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="aspect_raito" class="specification-child">aspect raito</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder='aspect_ratio' name='aspect_raito' class='aspect_raito' id='aspect_raito'>
                                    </div>
                                    
                                  </div>
                                  <div class="specification-row">
                                  <label for="ppi" class="specification-child">ppi</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'ppi' name='ppi' class='ppi' id='ppi'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="sb_ratio" class="specification-child">sb ratio</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'Screen to Body Ratio' name='sb_ratio' class='sb_ratio' id='sb_ratio'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="glass_type" class="specification-child">glass type</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'Glass Type' name='glass_type' class='glass_type' id='glass_type'>
                                    </div>
                                  </div>
                               


                                  <div class="specification-row">
                                  <label for="notch" class="specification-child">notch</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='notch' class='notch m' id='notch'>
                                      <input type='text' placeholder= 'Notch' name='notch_details' class='notch_details' id='notch_details'>
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
                                    <input type='text' placeholder= 'RAM' name='ram' class='ram' id='ram'>
                                  </div>
                                </div>
                                <div class="specification-row">
                                <label for="storage" class="specification-child">storage</label> 
                                  <div class="specification-child">
                                    <input type='text' placeholder= 'Storage' name='storage' class='storage' id='storage'>
                                  </div>
                                </div>
                                <div class="specification-row">
                                <label for="card_slot" class="specification-child">card slot</label> 
                                  <div class="specification-child aaa">
                                    <input type='checkbox' name='card_slot' class='card_slot' id='card_slot'>
                                    <input type='text' placeholder= 'Card Slot' name='card_slot_details' class='card_slot_details' id='card_slot_details'>
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
                                      <input type='checkbox' name='gprs' class='gprs' id='gprs'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="edge" class="specification-child">edge</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' name='edge' class='edge' id='edge'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="3g" class="specification-child">3g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' name='3g' class='3g' id='3g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="4g" class="specification-child">4g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' name='4g' class='4g' id='4g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="5g" class="specification-child">5g</label> 
                                    <div class="specification-child">
                                      <input type='checkbox' name='5g' class='5g' id='5g'>
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="volte" class="specification-child">volte</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='volte' class='volte' id='volte'>
                                      <input type='text' placeholder= 'VoLte' name='volte_details' class='volte_details' id='volte_details'>
                      
                                    </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="wifi" class="specification-child">wifi</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='wifi' class='wifi' id='wifi'>
                                      <input type='text' placeholder= 'wifi' name='wifi_details' class='wifi_details' id='wifi_details'>
                                      </div>
                                  </div>
                                  <div class="specification-row">
                                  <label for="blutooth" class="specification-child">blutooth</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='blutooth' class='blutooth' id='blutooth'>
                      <input type='text' placeholder= 'blutooth' name='blutooth_details' class='blutooth_details' id='blutooth_details'>
                      </div>
                                    </div>
                                  
                                  <div class="specification-row">
                                  <label for="usb" class="specification-child">usb</label> 
                                    <div class="specification-child aaa">
                                      <input type='checkbox' name='usb' class='usb' id='usb'>
                      <input type='text' placeholder= 'usb' name='usb_details' class='usb_details' id='usb_details'>
                      </div>
                                    </div>
                                  
                                  <div class="specification-row">
                                  <label for="usb_feature" class="specification-child">usb feature</label> 
                                    <div class="specification-child">
                                      <input type='text' placeholder= 'usb features' name='usb_feature' class='usb_feature' id='usb_feature'>
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
                                <input type='checkbox' name='gps' class='gps' id='gps'>
                                <input type='text' placeholder= 'gps' name='gps_details' class='gps_details' id='gps_details'>
                                
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="fingerprint" class="specification-child">fingerprint</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' name='fingerprint' class='fingerprint' id='fingerprint'>
                      <input type='text' placeholder= 'fingerprint' name='fingerprint_details' class='fingerprint_details' id='fingerprint_details'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="face_unlock" class="specification-child">face unlock</label> 
                              <div class="specification-child">
                                <input type='checkbox' name='face_unlock' class='face_unlock' id='face_unlock'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="sensors" class="specification-child">sensors</label> 
                              <div class="specification-child">
                                <input type='text' placeholder= 'sensors' name='sensors' class='sensors' id='sensors'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="headphone_jack" class="specification-child">headphone jack</label> 
                              <div class="specification-child">
                                <input type='checkbox' name='headphone_jack' class='headphone_jack' id='headphone_jack'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="extra" class="specification-child">extra</label> 
                              <div class="specification-child">
                                <input type='text' placeholder= 'extra' name='extra' class='extra' id='extra'>
                      
                              </div>
                            </div>
                           </div>
                           </div>
                          
                            
                         
                            <h3>Camera</h3>
                          <div class="specification">
                            <div class="specification-row">
                            <label for="rear_camera" class="specification-child">rear camera</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' name='rear_camera' class='rear_camera' id='rear_camera'>
                      <input type='text' placeholder= 'rear camera' name='rear_camera_details' class='rear_camera_details' id='rear_camera_details'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                              <label for="feature" class="specification-child">Features</label>
                              <div class="specification-child">
                                <input type='text' placeholder= 'features' name='feature' class='feature' id='feature'>
                      
                              </div>
                            </div>
                            <div class="specification-row">
                            <label for="video_recording" class="specification-child">video recording</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' name='video_recording' class='video_recording' id='video_recording'>
                      <input type='text' placeholder= 'video recording' name='video_recording_details' class='video_recording_details' id='video_recording_details'>   
                      </div>
                              </div>
                            
                            <div class="specification-row">
                              <div class="specification-child">Flash</div>
                              <div class="specification-child aaa">
                                <input type='checkbox' name='flash' class='flash' id='flash'>
                      <input type='text' placeholder= 'flash' name='flash_type' class='flash_type' id='flash_type'>
                      </div>
                              </div>
                            
                            <div class="specification-row">
                            <label for="front_camera" class="specification-child">front camera</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' name='front_camera' class='front_camera' id='front_camera'>
                      <input type='text' placeholder= 'front camera' name='front_camera_details' class='front_camera_details' id='front_camera_details'>
                      </div>
                              </div>
                            
                            <div class="specification-row">
                            <label for="front_camera_video" class="specification-child">front camera video</label> 
                              <div class="specification-child aaa">
                                <input type='checkbox' name='front_camera_video' class='front_camera_video' id='front_camera_video'>
                      <input type='text' placeholder= 'front video recording' name='front_camera_video_details' class='front_camera_video_details' id='front_camera_video_details'>
                      
                              </div>
                            </div>
                      </div>
                  
                      
                     
                      
                      
                            <div>
                              <h3>Technical</h3>
                            <div class="specification">
                              <div class="specification-row">
                              <label for="os" class="specification-child">os</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'operating system' name='os' class='os' id='os'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="chipset" class="specification-child">chipset</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'chipset' name='chipset' class='chipset' id='chipset'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="cpu" class="specification-child">cpu</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'cpu' name='cpu' class='cpu' id='cpu'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="core_details" class="specification-child">core details</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'core details' name='core_details' class='core_details' id='core_details'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="gpu" class="specification-child">gpu</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'gpu' name='gpu' class='gpu' id='gpu'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="java" class="specification-child">java</label> 
                                <div class="specification-child">
                                  <input type='checkbox' name='java' class='java' id='java'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="browser" class="specification-child">browser</label> 
                                <div class="specification-child">
                                  <input type='checkbox' name='browser' class='browser' id='browser'>
                      
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
                                  <input type='checkbox' name='email' class='email' id='email'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="music" class="specification-child">music</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' name='music' class='music' id='music'>
                      <input type='text' placeholder= 'music' name='music_type' class='music_type' id='music_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="video" class="specification-child">video</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' name='video' class='video' id='video'>
                      <input type='text' placeholder= 'video' name='video_type' class='video_type' id='video_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="fm_radio" class="specification-child">fm radio</label> 
                                <div class="specification-child">
                                  <input type='checkbox' name='fm_radio' class='fm_radio' id='fm_radio'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="document_reader" class="specification-child">document reader</label> 
                                <div class="specification-child">
                                  <input type='checkbox' name='document_reader' class='document_reader' id='document_reader'>
                                </div>
                              </div>
                              
                            </div>
                            </div>
                           
                              <h3>Battery Type</h3>
                            <div class="specification">
                              <div class="specification-row">
                              <label for="battery_type" class="specification-child">battery type</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'type' name='battery_type' class='battery_type' id='battery_type'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="battery_size" class="specification-child">battery size</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'size' name='battery_size' class='battery_size' id='battery_size'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="fast_charging" class="specification-child">fast charging</label> 
                                <div class="specification-child aaa">
                                  <input type='checkbox' name='fast_charging' class='fast_charging' id='fast_charging'>
                      <input type='text' placeholder= 'fast charging' name='fast_charging_details' class='fast_charging_details' id='fast_charging_details'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="talk_time" class="specification-child">talk time</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'talk time' name='talk_time' class='talk_time' id='talk_time'>
                      
                                </div>
                              </div>
                              <div class="specification-row">
                              <label for="playback_time" class="specification-child">playback time</label> 
                                <div class="specification-child">
                                  <input type='text' placeholder= 'music playbacktime' name='playback_time' class='playback_time' id='playback_time'>
                                </div>
                              </div>
                              
                           
                      
                      
                      
                      </div> 
                      </div>
              





                        </div>








                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add" class="btn btn-primary">Save Mobile</button>
                            </div>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    <div>
<div>




<?php 
include("includes/footer.php");
?>



