<?php
include 'db_cred.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$username = $_REQUEST['username'];  
$password = $_REQUEST['password'];
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO login values ('$name','$email','$number','$username','$password')";

if (mysqli_query($conn, $sql)) {

    header("Location: login.html");
    exit();
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>