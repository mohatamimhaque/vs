<?php
session_start();
include("admin/config/dbcon.php");

if(isset($_POST["login_btn"])){
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    
    $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password'  OR uname='$email' AND password = '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
        foreach($login_query_run as $data){
            $user_id = $data['id'];
            $name = $data['name'];
            $user_name = $data['uname'];
            $user_email = $data['email'];
            $user_photo = $data['user_photo'];
            $role_as = $data['role_as'];
            $status = $data['status'];//1 =Delete Account, 0=Active
        }








       if($status == "0"){
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";//1 =admin, 0=user
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'name' => $name,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_photo' => $user_photo
        ];

        if($_SESSION['auth_role']=='1'){
            $_SESSION["message"] = "Welcome to Dashboard";
            header("location: admin/index");
            exit(0);
        }
        
        if($_SESSION['auth_role']=='2'){
            $_SESSION["message"] = "Welcome to Dashboard";
            header("location: admin/index");
            exit(0);
        }
        if($_SESSION['auth_role']=='0'){//0=user
            $_SESSION["message"] = "You are successfully logged in";
            header("location:index.php");
            exit(0);
        }

}
    else{
        $_SESSION["message"] = "Invalid email or Password";
        header("location: login.php");
        exit(0);
    }



}
else{
        $_SESSION["message"] = "Invalid email or Password";
        header("location: login.php");
        exit(0);
    }
}

else{
    $_SESSOIN["message"] = "You Are Not Allowed to access this file";
    header("location :index.php");
    exit(0);
}




?>