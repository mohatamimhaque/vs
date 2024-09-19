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
              <?php if($row['series'] != ''){ ?>
                <div class="d-flex">
                  <h4>series</h4>
                  <p><?= $row['series'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['model'] != ''){ ?>
                <div class="d-flex">
                  <h4>model</h4>
                  <p><?= $row['model'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['device_type'] != ''){ ?>
                <div class="d-flex">
                  <h4>Type</h4>
                  <p><?= $row['device_type'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['utility'] != ''){ ?>
                <div class="d-flex">
                  <h4>utility</h4>
                  <p><?= $row['utility'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['os'] != ''){ ?>
                <div class="d-flex">
                  <h4>operating system</h4>
                  <p><?= $row['os'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['dimensions'] != ''){ ?>
                <div class="d-flex">
                  <h4>dimensions</h4>
                  <p><?= $row['dimensions'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['weight'] != ''){ ?>
                <div class="d-flex">
                  <h4>weight</h4>
                  <p><?= $row['weight'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['warranty'] != ''){ ?>
                <div class="d-flex">
                  <h4>warranty</h4>
                  <p><i class="fa-solid fa-check"></i> <?= $row['warranty'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="display sdiv shadowdiv m-2">
              <h3>Display</h3>
              <?php if($row['display_type'] != ''){ ?>
                <div class="d-flex">
                  <h4>Type</h4>
                  <p><?= $row['display_type'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['touch'] != ''){ ?>
                <div class="d-flex">
                  <h4>Touch</h4>
                  <p><i class="fa-solid fa-check"></i> Yes</p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>Touch</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['size'] != ''){ ?>
                <div class="d-flex">
                  <h4>size</h4>
                  <p><?= $row['size'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['resolution'] != ''){ ?>
                <div class="d-flex">
                  <h4>resolution</h4>
                  <p><?= $row['resolution'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['ppi'] != ''){ ?>
                <div class="d-flex">
                  <h4>PPI</h4>
                  <p><?= $row['ppi'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['anti_glare_screen'] != ''){ ?>
                <div class="d-flex">
                  <h4>anti glare screen</h4>
                  <p><i class="fa-solid fa-check"></i> Yes</p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>anti glare screen</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['refresh_rate'] != ''){ ?>
                <div class="d-flex">
                  <h4>Refresh Rate</h4>
                  <p><?= $row['refresh_rate'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['features'] != ''){ ?>
                <div class="d-flex">
                  <h4>features</h4>
                  <p><?= $row['features'] ?></p>
                </div>
              <?php } ?>
            </div>
           
            <div class="connectivity sdiv shadowdiv m-2">
              <h3>Connectivity</h3>
              <?php if($row['ethernet'] != ''){ ?>
                <div class="d-flex">
                  <h4>ethernet</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['ethernet'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>ethernet</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['wifi'] != ''){ ?>
                <div class="d-flex">
                  <h4>wifi</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['wifi'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>wifi</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['bluetooth'] != ''){ ?>
                <div class="d-flex">
                  <h4>bluetooth</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['bluetooth'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>bluetooth</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['usb_ports'] != ''){ ?>
                <div class="d-flex">
                  <h4>USB Ports</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['usb_ports'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>USB Ports</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['hdmi'] != ''){ ?>
                <div class="d-flex">
                  <h4>HDMI</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['hdmi'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>HDMI</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['microphone'] != ''){ ?>
                <div class="d-flex">
                  <h4>microphone</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['microphone'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>microphone</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['headphone_jack'] != ''){ ?>
                <div class="d-flex">
                  <h4>headphone jack</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['headphone_jack'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>headphone jack</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
          </div>
            <div class="input sdiv shadowdiv m-2">
              <h3>input</h3>
              <?php if($row['security_lock_port'] != ''){ ?>
                <div class="d-flex">
                  <h4>security lock port</h4>
                  <p><?= $row['security_lock_port'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['fingerprint_sensor'] != ''){ ?>
                <div class="d-flex">
                  <h4>fingerprint sensor</h4>
                  <p><?= $row['fingerprint_sensor'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['camera'] != ''){ ?>
                <div class="d-flex">
                  <h4>camera</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['camera'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>camera</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['keyboard'] != ''){ ?>
                <div class="d-flex">
                  <h4>keyboard</h4>
                  <p><?= $row['keyboard'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['keyboard_backlit'] != ''){ ?>
                <div class="d-flex">
                  <h4>keyboard backlit</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['keyboard_backlit'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>keyboard backlit</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['touchpad'] != ''){ ?>
                <div class="d-flex">
                  <h4>touchpad</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['touchpad'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>touchpad</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['inbuilt_microphone'] != ''){ ?>
                <div class="d-flex">
                  <h4>inbuilt microphone</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['inbuilt_microphone'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>inbuilt microphone</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['speakers'] != ''){ ?>
                <div class="d-flex">
                  <h4>speakers</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['speakers'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>speakers</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['sound'] != ''){ ?>
                <div class="d-flex">
                  <h4>sound</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['sound'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>sound</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
              <?php if($row['optical_drive'] != ''){ ?>
                <div class="d-flex">
                  <h4>optical drive</h4>
                  <p><i class="fa-solid fa-check"></i> <?=$row['optical_drive'] ?></p>
                </div>
              <?php } else{?>
                <div class="d-flex">
                  <h4>optical drive</h4>
                  <p><i class="fa-solid fa-xmark"></i> No</p>
                </div>
              <?php }?>
          </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
            <div class="processor sdiv shadowdiv m-2">
              <h3>processor</h3>
              <?php if($row['processor'] != ''){ ?>
                <div class="d-flex">
                  <h4>processor</h4>
                  <p><?= $row['processor'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['speed'] != ''){ ?>
                <div class="d-flex">
                  <h4>speed</h4>
                  <p><?= $row['speed'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['cache'] != ''){ ?>
                <div class="d-flex">
                  <h4>cache</h4>
                  <p><?= $row['cache'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['processor_brand'] != ''){ ?>
                <div class="d-flex">
                  <h4>brand</h4>
                  <p><?= $row['processor_brand'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['processor_series'] != ''){ ?>
                <div class="d-flex">
                  <h4>series</h4>
                  <p><?= $row['processor_series'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['processor_model'] != ''){ ?>
                <div class="d-flex">
                  <h4>model</h4>
                  <p><?= $row['processor_model'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['generation'] != ''){ ?>
                <div class="d-flex">
                  <h4>generation</h4>
                  <p><?= $row['generation'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['chipset'] != ''){ ?>
                <div class="d-flex">
                  <h4>chipset</h4>
                  <p><?= $row['chipset'] ?></p>
                </div>
              <?php } ?>
             
            </div>
            <div class="graphics sdiv shadowdiv m-2">
              <h3>graphics</h3>
              <?php if($row['gpu'] != ''){ ?>
                <div class="d-flex">
                  <h4>GPU</h4>
                  <p><?= $row['gpu'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['dedicated_memory'] != ''){ ?>
                <div class="d-flex">
                  <h4>dedicated memory</h4>
                  <p><?= $row['dedicated_memory'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['gpu_brand'] != ''){ ?>
                <div class="d-flex">
                  <h4>brand</h4>
                  <p><?= $row['gpu_brand'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="Memory sdiv shadowdiv m-2">
              <h3>Memory</h3>
              <?php if($row['ram'] != ''){ ?>
                <div class="d-flex">
                  <h4>RAM</h4>
                  <p><?= $row['ram'] ?> <?php if($row['ram_type'] != ''){ echo $row['ram_type']; } ?></p>
                </div>
              <?php } ?>
              <?php if($row['ram_bus_speed'] != ''){ ?>
                <div class="d-flex">
                  <h4>RAM bus speed</h4>
                  <p><?= $row['ram_bus_speed'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['ram_slots'] != ''){ ?>
                <div class="d-flex">
                  <h4>ram slots</h4>
                  <p><?= $row['ram_slots'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['hdd'] != ''){ ?>
                <div class="d-flex">
                  <h4>Harddisk</h4>
                  <p><?= $row['hdd'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['ssd'] != ''){ ?>
                <div class="d-flex">
                  <h4>Solid Sate drive</h4>
                  <p><?= $row['ssd'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['extra_slot'] != ''){ ?>
                <div class="d-flex">
                  <h4>extra slot</h4>
                  <p><i class="fa-solid fa-check"></i> Yes</p>
                </div>
              <?php } ?>
              
             
            </div>
            <div class="battery sdiv shadowdiv m-2">
              <h3>battery</h3>
              <?php if($row['battery'] != ''){ ?>
                <div class="d-flex">
                  <h4>battery</h4>
                  <p><?= $row['battery'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['adapter_type'] != ''){ ?>
                <div class="d-flex">
                  <h4>adapter type</h4>
                  <p><?= $row['adapter_type'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['battery_backup'] != ''){ ?>
                <div class="d-flex">
                  <h4>battery backup</h4>
                  <p><?= $row['battery_backup'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="extra sdiv shadowdiv m-2">
              <h3>extra</h3>
              <?php if($row['included_software'] != ''){ ?>
                <div class="d-flex">
                  <h4>included software</h4>
                  <p><?= $row['included_software'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['sales_package'] != ''){ ?>
                <div class="d-flex">
                  <h4>sales package</h4>
                  <p><?= $row['sales_package'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['others_features'] != ''){ ?>
                <div class="d-flex">
                  <h4>others features</h4>
                  <p><?= $row['others_features'] ?></p>
                </div>
              <?php } ?>
              <?php if($row['extra'] != ''){ ?>
                <div class="d-flex">
                  <h4>extra</h4>
                  <p><?= $row['extra'] ?></p>
                </div>
              <?php } ?>
            </div>
            
          

          </div>
        </div>
      </div>
  </div>
  <?php if($row['description']  != ''){ ?>
    <div class="description  shadowdiv m-2">
      <p style="text-transform:uppercase;font-size:20px;color:#6A87AF;margin:0;padding:0"><?= $row['name'] ?> deatails</p>
      <hr>
      <div class="w-100 pt-2 descriptionText">
        <?= $row['description'] ?>
      </div>
    </div>
    <?php } ?>
  </section>

