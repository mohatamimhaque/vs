<?php

session_start();

include('config/dbcon.php');


if(!isset($_SESSION['auth'])){

    $_SESSION['message'] = "Login to Access Dashboard";

    header("Location: ../login.php");

    exit(0);

}

else{

    if($_SESSION['auth_role'] == "0"){
        $user_level="Normal Member";
        $_SESSION['message'] = "You Are not Authorised as ADMIN";
        header("Location: ../index.php");
        exit(0);

    }
    else if($_SESSION['auth_role'] == "1"){
        $user_level="Administrator";

    }
    else if($_SESSION['auth_role'] == "2"){
        $user_level="Editor";

    }
    else{

    }

}

?>



