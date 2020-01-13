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
    return strpos($url, $page) !== true;
}

?>