<?php
session_start();
include("../admin/config/dbcon.php");
?>
<?php
if(!isset($_SESSION['auth'])){
if(isset($_FILES['image']['name'])){
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $checkemail = "SELECT uname from users WHERE uname='$email'";
    $checkemail_run = mysqli_query($con, $checkemail);
    if(mysqli_num_rows($checkemail_run)>0){
         echo "You Are Already Registered";
    }
    else{
        $allowTypes = array('jpg','png','jpeg','gif','jfif'); 
        if(in_array($image_extension, $allowTypes)){
            $user_query = "INSERT INTO users (name,uname,email,password,user_photo,gender) VALUES ('$name','$uname','$email','$password','$filename','$gender')";
            $user_query_run = mysqli_query($con, $user_query);
            
            if($user_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], '../admin/upload/user/image/'.$filename);
                echo "Register Successfully";
             }
             else{
                echo "Something went worng!";
             }
        }
        else{
            echo "This Image Type Don't Allow";
        }
    }
}}
else{
    echo "You Are Already Login";
}
?>