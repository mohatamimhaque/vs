<?php

session_start();



if(isset($_POST['logout_btn'])){

    //session destroy()

    unset( $_SESSION['auth']);

    unset( $_SESSION['auth_role']);

    unset( $_SESSION['auth_user']);



    $_SESSION['message'] = "Logged out Successfully";

    header("Location: index.php");

    exit(0);

}

    



?>