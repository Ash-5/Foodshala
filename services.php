<?php

require_once "mailer.php";
require_once "database.php";
require_once "utils.php";
$conn = connectDB();

if(array_key_exists('submit', $_POST)) {
    if($_POST['submit']=="Add Product"){
        return addProduct($conn);
    }elseif($_POST['submit']=="Add Yourself"){
        return registerUser($conn);
    }
    elseif($_POST['submit']== "Sign In"){
        return authenticateUser($conn);
    }
    elseif($_POST['submit']== "Add Restaurent");{
        return addRestaurent($conn);
    }
}

function addProduct($conn) {
    $path_filename_ext = NULL;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $catagory = $_POST['category'];
    $active = $_POST['productstatus'] == "on";
    $rest_id= $_POST['restid'];
    //$img = $_POST['image'];
    $type= $_POST['type'];
    if (($_FILES['image']['name']!="")){
        // Where the file is going to be stored
         $target_dir = "images/products/";
         $file = $_FILES['image']['name'];
         $path = pathinfo($file);
         $filename = $path['filename'];
         $ext = $path['extension'];
         $temp_name = $_FILES['image']['tmp_name'];
         $path_filename_ext = $target_dir.$filename.".".$ext;
         
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
         echo "Sorry, file already exists.";
         }else{
         move_uploaded_file($temp_name,$path_filename_ext);
         echo "Congratulations! File Uploaded Successfully.";
         }
        }
    $result=mysqli_query($conn, "insert into product values(NULL, '$name', '$price', '$description','$rest_id', '$catagory', '$active', '$path_filename_ext', '$type')");
    //echo $result;
    if (!$result)     
		die("Database access failed: " . mysqli_error($conn)); 
}

function getProducts($conn){
    return $result=mysqli_query($conn, "select * from product");
}

function registerUser($conn){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $category = $_POST['category'];
    $number = $_POST['number'];
    $paswd = crypt($password, 'secret');

    $result = mysqli_query($conn, "insert into users values(NULL, '$username', '$email', '$paswd', '$role', '$category', '$number')");
    if (mysqli_error($conn))     
		die("Database access failed: " . mysqli_error($conn));
}

function authenticateUser($conn){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $paswd = crypt($password, 'secret');
    echo $paswd;
    $result = mysqli_fetch_assoc(mysqli_query($conn, "select password, id from users where email = '$email'"));
    
    if($result["password"] === $paswd){
        $sessionid = uniqid();
        $uid = $result["id"];
        $milliseconds = round(microtime(true) * 1000 + 6000000);
        $answer = mysqli_query($conn, "insert into session values('$sessionid','$milliseconds','$uid')");
        setcookie("sessionId", $sessionid, $milliseconds / 1000, "/");
        gotoRoute("home");
        echo "successfull login";
    }
}

function addRestaurent($conn){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $restaurentstatus = $_POST['restaurentstatus'];
    $path_filename_ext = NULL;
    $mobile = $_POST['mobile'];
    $emailSubject = 'Your password for foodshala';
    $mailto = $_POST['email'];
    $sender ="admin@foodshala.com";
    $headers = "From: $sender\r\n";
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $pass = randomPassword();
    $password = $pass;
    $paswd = crypt($password, 'secret');
    $body ="Your System generated password is $password";
    $role ="Restaurent";
    if (($_FILES['logo']['name']!="")) {
        // Where the file is going to be stored
         $target_dir = "images/logo/";
         $file = $_FILES['logo']['name'];
         $path = pathinfo($file);
         $filename = $path['filename'];
         $ext = $path['extension'];
         $temp_name = $_FILES['logo']['tmp_name'];
         $path_filename_ext = $target_dir.$filename.".".$ext;
         
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else{
            move_uploaded_file($temp_name,$path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
        }
    }
    echo($mobile.PHP_EOL);   
    $answer = mysqli_query($conn, "insert into users values(NULL, '$name', '$email', '$paswd', '$role', NULL, '$mobile')");
    if (mysqli_error($conn))
        die("Database access failed: " . mysqli_error($conn));
    $tempresult = mysqli_fetch_assoc(mysqli_query($conn, "select id from users where email = '$email'"));
    $userid = $tempresult["id"];
    $result = mysqli_query($conn, "insert into restorent values(NULL, '$name', '$email', '$bio','$userid', '$restaurentstatus', '$path_filename_ext')");
    if (mysqli_error($conn)){   
        die("Database access failed: " . mysqli_error($conn));
    }else{
        $success = sendMail($mailto, $emailSubject, $body);
    }
}

function logOut() {
    setcookie("sessionId", '', 0, "/");
    gotoRoute("login");
}
?>