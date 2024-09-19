<section id="specification" class="shadowdiv pt-1 pb-1">
   <div class="fullSpecification mt-2">
      <div class="fullSpecificationHeader shadowdiv">
        <p style="padding-bottom:2px;margin:0;text-transform:uppercase;font-size:24px;color:#6A87AF"><?= $row['name']?> full specifications</p>
        <hr >
      </div>
      <div class="fullSpecificationBody pt-1">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
            <div class="generel sdiv shadowdiv m-2">
              <h3>Generel</h3>
              <div class="d-flex">
                <h4>Sim Type</h4>
                <p><?= $row['sim_type'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Dual Sim</h4>
                <p>
                  <?php
                    if($row['dual_sim'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>Sim size</h4>
                <p><?= $row['sim_size'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Device Type</h4>
                <p><?= $row['device_type'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Release Date</h4>
                <p><?= $row['release_date'] ?></p>
              </div>
            </div>
            <div class="design sdiv shadowdiv m-2">
              <h3>design</h3>
              <div class="d-flex">
                <h4>dimensions</h4>
                <p><?= $row['dimensions'] ?></p>
              </div>
              <div class="d-flex">
                <h4>weight</h4>
                <p><?= $row['wieght'] ?></p>
              </div>
            </div>
            <div class="display sdiv shadowdiv m-2">
              <h3>Display</h3>
              <div class="d-flex">
                <h4>type</h4>
                <p><?= $row['display_type'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Touch</h4>
                <p>
                  <?php
                    if($row['touch'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes, <?= $row['touch_details'] ;?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>size</h4>
                <p><?= $row['size'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Aspect Ratio</h4>
                <p><?= $row['aspect_raito'] ?></p>
              </div>
              <div class="d-flex">
                <h4>PPI</h4>
                <p><?= $row['ppi'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Screen to Body Radio</h4>
                <p><?= $row['sb_ratio'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Glass type</h4>
                <p><?= $row['glass_type'] ?></p>
              </div>
              <div class="d-flex">
                <h4>notch</h4>
                <p>
                  <?php
                    if($row['notch'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes, <?= $row['notch_details'] ;?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
            </div>
            <div class="memory sdiv shadowdiv m-2">
              <h3>memory</h3>
              <div class="d-flex">
                <h4>ram</h4>
                <p><?= $row['ram'] ?></p>
              </div>
              <div class="d-flex">
                <h4>storage</h4>
                <p><?= $row['storage'] ?></p>
              </div>
              <div class="d-flex">
                <h4>card slot</h4>
                <p>
                  <?php
                    if($row['card_slot'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes, <?= $row['card_slot_details'] ;?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
            </div>
            <div class="connectivity sdiv shadowdiv m-2">
              <h3>Connectivity</h3>
              <div class="d-flex">
                <h4>GPRS</h4>
                <p>
                  <?php
                    if($row['gprs'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>EDGE</h4>
                <p>
                  <?php
                    if($row['edge'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>3G</h4>
                <p>
                  <?php
                    if($row['3g'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>4G</h4>
                <p>
                  <?php
                    if($row['4g'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>5G</h4>
                <p>
                  <?php
                    if($row['5g'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>VoLTE</h4>
                <p>
                  <?php
                    if($row['volte'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes, <?= $row["volte_details"] ?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>Wifi</h4>
                <p>
                  <?php
                    if($row['wifi'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes,  <?= $row["wifi_details"] ?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>Bluetooth</h4>
                <p>
                  <?php
                    if($row['blutooth'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes,  <?= $row["blutooth_details"] ?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>USB</h4>
                <p>
                  <?php
                    if($row['usb'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes,  <?= $row["usb_details"] ?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>USB features</h4>
                <p><?= $row['usb_feature'] ?></p>
              </div>
            </div>
            <div class="battery sdiv shadowdiv m-2">
              <h3>battery</h3>
              <div class="d-flex">
                <h4>type</h4>
                <p><?= $row['battery_type'] ?></p>
              </div>
              <div class="d-flex">
                <h4>size</h4>
                <p><?= $row['battery_size'] ?></p>
              </div>
              <div class="d-flex">
                <h4>fast charging</h4>
                <p>
                  <?php
                    if($row['fast_charging'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes, <?= $row['fast_charging_details']?>
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                <h4>Talk time</h4>
                <p><?= $row['talk_time'] ?></p>
              </div>
              <div class="d-flex">
                <h4>music playback time</h4>
                <p><?= $row['playback_time'] ?></p>
              </div>
             
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
            <div class="extra sdiv shadowdiv m-2">
                <h3>extra</h3>
              
                <div class="d-flex">
                  <h4>GPS</h4>
                  <p>
                    <?php
                      if($row['gps'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["gps_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>fignerprint sensor</h4>
                  <p>
                    <?php
                      if($row['fingerprint'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["fingerprint_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>face unlock</h4>
                  <p>
                    <?php
                      if($row['face_unlock'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>Sensors</h4>
                  <p><?= $row['sensors'] ?></p>
                </div>
                <div class="d-flex">
                  <h4>3.5mm Headphone jack</h4>
                  <p>
                    <?php
                      if($row['headphone_jack'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>extra</h4>
                  <p><?= $row['extra'] ?></p>
                </div>
            </div>
           
            <div class="camera sdiv shadowdiv m-2">
                <h3>camera</h3>
              
                <div class="d-flex">
                  <h4>Rear Camera</h4>
                  <p>
                    <?php
                      if($row['rear_camera'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["rear_camera_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>Features</h4>
                  <p><?= $row['feature'] ?></p>
                </div>
                <div class="d-flex">
                  <h4>Video recording</h4>
                  <p>
                    <?php
                      if($row['video_recording'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["video_recording_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>flash</h4>
                  <p>
                    <?php
                      if($row['flash'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["flash_type"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>Front camera</h4>
                  <p>
                    <?php
                      if($row['front_camera'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["front_camera_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                
                <div class="d-flex">
                  <h4>front video recording</h4>
                  <p>
                    <?php
                      if($row['front_camera_video'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["front_camera_video_details"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
            </div>
           
            <div class="technical sdiv shadowdiv m-2">
              <h3>technical</h3>
              <div class="d-flex">
                <h4>OS</h4>
                <p><?= $row['os'] ?></p>
              </div>
              <div class="d-flex">
                <h4>chipset</h4>
                <p><?= $row['chipset'] ?></p>
              </div>
              <div class="d-flex">
                <h4>CPU</h4>
                <p><?= $row['cpu'] ?></p>
              </div>
              <div class="d-flex">
                <h4>core details</h4>
                <p><?= $row['core_details'] ?></p>
              </div>
              <div class="d-flex">
                <h4>GPU</h4>
                <p><?= $row['gpu'] ?></p>
              </div>
              <div class="d-flex">
                <h4>Java</h4>
                <p>
                  <?php
                    if($row['java'] == '1'){
                    ?>
                    <i class="fa-solid fa-check"></i> yes
                    <?php
                    }
                    else{
                      ?>
                      <i class="fa-solid fa-xmark"></i> No                   
                    <?php
                    }
                  ?>
                </p>
              </div>
              <div class="d-flex">
                  <h4>browser</h4>
                  <p>
                    <?php
                      if($row['browser'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
              </div>
            </div>

            
            <div class="multimedia sdiv shadowdiv m-2">
                <h3>multimedia</h3>
              
                <div class="d-flex">
                  <h4>email</h4>
                  <p>
                    <?php
                      if($row['email'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                
                <div class="d-flex">
                  <h4>Music</h4>
                  <p>
                    <?php
                      if($row['music'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes, <?= $row["music_type"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>video</h4>
                  <p>
                    <?php
                      if($row['video'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i>yes,<?= $row["video_type"] ?>
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                <div class="d-flex">
                  <h4>fm radio</h4>
                  <p>
                    <?php
                      if($row['fm_radio'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
                
                <div class="d-flex">
                  <h4>Document reader</h4>
                  <p>
                    <?php
                      if($row['document_reader'] == '1'){
                      ?>
                      <i class="fa-solid fa-check"></i> yes
                      <?php
                      }
                      else{
                        ?>
                        <i class="fa-solid fa-xmark"></i> No                   
                      <?php
                      }
                    ?>
                  </p>
                </div>
            </div>

          </div>
        </div>
      </div>
  </div>
    <div class="description  shadowdiv m-2">
      <p style="text-transform:uppercase;font-size:20px;color:#6A87AF;margin:0;padding:0"><?= $row['name'] ?> deatails</p>
      <hr>
      <div class="w-100 pt-2 descriptionText">
        <?= $row['description'] ?>
      </div>
    </div>
  </section>

