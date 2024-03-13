<?php
include 'db_cred.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
session_start();
// Taking all 5 values from the form data(input)

$name = $_SESSION['username'];
$name2 = $_SESSION['username'];
$source = $_REQUEST['source'];
$destination = $_REQUEST['destination'];
$date = $_REQUEST['date'];
$time = $_REQUEST['time'];
$number = $_REQUEST['number'];

$sql = "INSERT INTO registration values ('$name','$source','$destination','$date','$time','$number')";

if (mysqli_query($conn, $sql)) {

    header("Location: index.php");
    exit();
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>