<?php
if(isset($_POST["data"])){
    $data = $_POST["data"];
    if($data == 'computing'){
    ?>
        <option value="applications">Applications</option>
        <option value="data_Managment">Data Managment</option>
        <option value="chips">Chips</option>
        <option value="personal_computer">Personal Computer</option>
        <option value="servers">Servers</option>
        <option value="operating_system">Operating System</option>
     <?php
    }
    if($data == 'internet'){
    ?>
        <option value="internet_of_things">Internet of Things</option>
        <option value="online_entertaiment">Online Entertaiment</option>
        <option value="search_tech">Search Tech</option>
        <option value="socail_networking">Social Networking</option>
        <option value="web_apps">Web Apps</option>
     <?php
    }
    if($data == 'it'){
    ?>
        <option value="developers">Developers</option>
        <option value="it_leadership">IT Leadership</option>
        <option value="network_management">Network Management</option>
     <?php
    }
    if($data == 'mobile_tech'){
        ?>
            <option value="mobile_apps">Mobile Apps</option>
            <option value="smartphones">Smartphones</option>
            <option value="tablets">Tablets</option>
            <option value="wearbale_tech">Werable Tech</option>
            <option value="wirless_networking">Wirless NEetworking</option>
         <?php
    }
    if($data == 'security'){
        ?>
            <option value="cyber_security">Cyber Security</option>
            <option value="hacking">Hacking</option>
            <option value="malware">Malware</option>
            <option value="privacy">Privacy</option>
         <?php
    }
    if($data == 'technology'){
        ?>
            <option value="audio_video">Audio/video</option>
            <option value="Gaming">Gaming</option>
            <option value="how_to">How To</option>
            <option value="tech_law">Tech Law</option>
            <option value="space">Space</option>
         <?php
        }
}
?>