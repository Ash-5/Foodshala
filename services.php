<?php
require_once "mailer.php";
require_once "database.php";
require_once "utils.php";
require_once "middleware.php";
$conn = connectDB();

if(array_key_exists('submit', $_POST)) {
    if($_POST['submit'] == "Add Product"){
        addProduct($conn);
    }elseif($_POST['submit'] == "Add Yourself"){
        registerUser($conn);
    }
    elseif($_POST['submit'] == "Sign In"){
        authenticateUser($conn);
    }
    elseif($_POST['submit'] == "Add Restaurent"){
        addRestaurent($conn);
    }
    elseif($_POST['submit'] == "Logout"){
        logOut($conn);
    }
}

function addProduct($conn) {
    $path_filename_ext = NULL;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $catagory = $_POST['category'];
    $active = $_POST['productstatus'] == "on";
    $rest_id = (int) $_POST['restid'];
    $type= $_POST['type'];
    if (($_FILES['image']['name']!="")) {
        $target_dir = "images/products/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        if(file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else{
            move_uploaded_file($temp_name,$path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
        }
    }
    $result = mysqli_query($conn, "insert into product values(NULL, '$name', '$price', '$description', $rest_id, '$catagory', '$active', '$path_filename_ext', '$type')");
    //echo $result;
    if (mysqli_error($conn))     
        die("Database access failed: " . mysqli_error($conn)); 
}

function getProducts($conn){
    return mysqli_query($conn, "select * from product");
}

function navRoleNewUser($conn){
    $id = (int) getUIDBySessionId($conn);
    if($id == NULL){
        return false;
    }
}

function navRoleOldUser($conn){
    $id = (int) getUIDBySessionId($conn);
    return mysqli_fetch_assoc(mysqli_query($conn, "select name, role from users where id = $id"));
}

function getRestaurantProduct($conn) {
    $id = (int) getUIDBySessionId($conn);
    $rest_id = mysqli_fetch_assoc(mysqli_query($conn, "select id from restaurant where user_id = $id"));
    $rest_id = (int) $rest_id['id'];
    $result = mysqli_query($conn,"select * from product where rest_id = $rest_id ");
    return $result;
}

function getAllRestaurant($conn) {
    return mysqli_query($conn, "select * from  restaurant" );
}

function getProductByRestaurant($conn){
    return null;
}

function getRestaurant($conn) {
    $uid = (int)getUIDBySessionId($conn);
    $result =  mysqli_fetch_assoc(mysqli_query($conn, "select * from restaurant where user_id = $uid"));

    return $result;
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
    
    gotoRoute("login");
}

function authenticateUser($conn) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $paswd = crypt($password, 'secret');
    $result = mysqli_fetch_assoc(mysqli_query($conn, "select password, id, role from users where email = '$email'"));
    if($result["password"] == $paswd){
        if($result["role"] == "Admin"){
            $sessionid = uniqid();
            $uid = $result["id"];
            $milliseconds = round(microtime(true) * 1000 + 6000000);
            $answer = mysqli_query($conn, "insert into session values('$sessionid','$milliseconds',$uid)");
            setcookie("sessionId", $sessionid, $milliseconds / 1000, "/");
            gotoRoute("allrestaurent");
        } else if($result["role"] == "Restaurent"){
            $sessionid = uniqid();
            $uid = (int) $result["id"];
            $milliseconds = round(microtime(true) * 1000 + 6000000);
            $answer = mysqli_query($conn, "insert into session values('$sessionid','$milliseconds',$uid)");
            setcookie("sessionId", $sessionid, $milliseconds / 1000, "/");
            gotoRoute("restaurant");
        } else if($result["role"] == "user"){
            $sessionid = uniqid();
            $uid = (int) $result["id"];
            $milliseconds = round(microtime(true) * 1000 + 6000000);
            $answer = mysqli_query($conn, "insert into session values('$sessionid','$milliseconds',$uid)");
            setcookie("sessionId", $sessionid, $milliseconds / 1000, "/");
            gotoRoute("home");
        } else {
            gotoRoute("login");
        }
    } else {
        gotoRoute("login");
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
    // function randomPassword() {
    //     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    //     $pass = array(); //remember to declare $pass as an array
    //     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    //     for ($i = 0; $i < 8; $i++) {
    //         $n = rand(0, $alphaLength);
    //         $pass[] = $alphabet[$n];
    //     }
    //     return implode($pass); //turn the array into a string
    // }
    //$pass = randomPassword();
    //$password = $pass;
    $password= "Ash123";
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
    $result = mysqli_query($conn, "insert into restaurant values(NULL, '$name', '$email', '$bio','$userid', '$restaurentstatus', '$path_filename_ext')");
    if (mysqli_error($conn)){   
        die("Database access failed: " . mysqli_error($conn));

    }else{
        gotoRoute("allrestaurent");
        //$success = sendMail($mailto, $emailSubject, $body);
    }
}

function logOut($conn) {
   setcookie("sessionId", '', 0, "/");
    $sessionid = $_COOKIE["sessionId"];
    mysqli_query($conn, "delete from session where id = '$sessionid'");
    gotoRoute("login");
}
?>