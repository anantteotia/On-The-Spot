<?php
include 'db_cred.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = "Select * from login where username='$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {

        if (($password == $row['password'])) {
           
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: index.php");
        } else {
            echo ("Invalid Credentials");
        }
    }

} else {
    echo ("Invalid Credentials");
}

?>