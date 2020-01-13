<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die("Connection error");
    } else {
        if (!mysqli_select_db($conn, "foodshala")) {
            die("No database found");
        }
    }
    return $conn;
}
?>