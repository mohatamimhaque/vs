<?php
session_start();
include("admin/config/dbcon.php");

if(isset($_POST["register_btn"])){
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $uname = mysqli_real_escape_string($con, $_POST["uname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($con, $_POST["cpassword"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    
    
    if($password == $confirm_password){
        // Check Mail
        $checkemail = "SELECT email from users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
    
        if(mysqli_num_rows($checkemail_run)>0){
            //Already email exists
            $_SESSION["message"] = "You Are Already Registered";
            header("location: login.php");
            exit(0);
        }
        else{
            $checkemail = "SELECT uname from users WHERE uname='$uname'";
            $checkemail_run = mysqli_query($con, $checkemail);
            if(mysqli_num_rows($checkemail_run)>0){
                //Already email exists
                $_SESSION["message"] = "Username Already Exists";
                header("location: register.php");
                exit(0);
            }
            else{
                    $allowTypes = array('jpg','png','jpeg','gif','jfif'); 
                    if(in_array($image_extension, $allowTypes)){
                    $user_query = "INSERT INTO users (name,uname,email,password,user_photo,gender) VALUES ('$name','$uname','$email','$password','$filename','$gender')";
                    $user_query_run = mysqli_query($con, $user_query);
                    
                    if($user_query_run){
                        move_uploaded_file($_FILES['image']['tmp_name'], 'admin/upload/user/image/'.$filename);
                        $_SESSION["message"] = "Register Successfully";
                        header("location: login.php");
                        exit(0);
                     }
                     else{
                        $_SESSION["message"] = "Something went worng!";
                        header("location: register.php");
                        exit(0);
                     }
                }
                else{
                    $_SESSION["message"] = "Profile Photo Allow Type jpg, png, jpeg, gif, jfif";
                    header("location: register.php");
                    exit(0);
                }
               
            }
        }
    }
    else{
        $_SESSION["message"] = "password does not Match";
        header("location: register.php");
        exit(0);
    }

}
else{
    $_SESSION["message"] = "Something went worng!";
    header("location: register.php");
    exit(0);
}


















?>
