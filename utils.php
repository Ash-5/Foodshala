<?php

function checkAccess($role) {
    return true;
}

function gotoRoute($page) {
    ob_start();
    header("Location: http://localhost/foodshala/$page.php");
    exit();
}

function checkRoute($page) {
    $url = $_SERVER['REQUEST_URI'];
    return strpos($url, $page);
}

function getUIDBySessionId($conn) {
    if(array_key_exists("sessionId", $_COOKIE)) {
        $result = mysqli_fetch_assoc(mysqli_query($conn, "select user_id from session"));
        return $result["user_id"];
    }
    return null;
}

?>