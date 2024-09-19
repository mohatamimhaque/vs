<?php

if(isset($_SESSION["message"])){

    ?>

    <div class="alert text-info alert-warning alert-dismissible fade show" role="alert" style="display:flex;justify-content:space-between">

        <p><strong>Hey!  </strong><?= $_SESSION["message"]; ?></p><ion-icon class="close-btn" name="close-outline"></ion-icon> 

    </div>

   <?php

    unset($_SESSION["message"]);

}

?>