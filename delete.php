<?php
session_start();
include 'db_cred.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$username = $_REQUEST['username'];
$Number = $_REQUEST['number'];
$sql = "DELETE FROM registration WHERE number=$Number AND name='$username'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

mysqli_close($conn);
?>