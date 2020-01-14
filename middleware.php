<?php

require_once "database.php";
require_once "utils.php";

function checkLogin() {
    $conn = connectDB();
    if(array_key_exists("sessionId", $_COOKIE)) {
        $sessionId = $_COOKIE["sessionId"];
        $result = mysqli_fetch_assoc(mysqli_query($conn, "select * from session where id = '$sessionId'"));
        $expiry = $result["expiry"];
        $uid = $result["user_id"];
        $user = mysqli_fetch_assoc(mysqli_query($conn, "select * from users where id = '$uid'"));
        $milliseconds = (string) round(microtime(true) * 1000);
        if(!($expiry > $milliseconds && checkAccess($user["role"]))) {
            if(!checkRoute("login")) {
                gotoRoute("login");
            }
        } else {
            if(checkRoute("login") || checkRoute("register")) {
                gotoRoute("home");
            }
        }
    } else {
        if(checkRoute("register")) {
            gotoRoute("register");
        } else if(!checkRoute("login")) {
            gotoRoute("login");
        }
    }
}
?>