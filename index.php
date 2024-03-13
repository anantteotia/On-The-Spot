<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location: login.html");
exit;}
?>
<html lang="en">


  <link rel="stylesheet" href="cards.css" />
  <link rel="stylesheet" href="index.css" />
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>On The Spot</title>
    <div class="navbar">
      <div class="nav-logo"><span class="logo-text">On The Spot</span></div>
      <div class="nav-links">
        <a href="create.php">Post a Journey</a>

        <a href="yourpost.php">Your Posts</a>
        <a href=""
          >Hello, 
          <?php echo $_SESSION['username']?>
        </a>
        <a href="logout.php">logout</a>
      </div>
      <div class="nav-cta"></div>
    </div>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
    include 'db_cred.php';
  
$mysqli = new mysqli($dbhost, $dbuser,
				$dbpassword, $dbname);
if ($mysqli->connect_error) { die('Connect Error (' . $mysqli->connect_errno .
    ') '. $mysqli->connect_error); } $sql = " SELECT * FROM registration";
    $result = $mysqli->query($sql); $mysqli->close(); ?>
    <!-- HTML code to display data in tabular format -->
    <div>
      <?php
				while($rows=$result->fetch_assoc()) { ?>
      <div class="courses-container">
        <div class="course">
          <div class="course-preview">
            <h2><?php echo $rows['name'];?></h2>
          </div>
          <div class="course-info">
            <div class="progress-container"></div>
            <h3>
              Source:
              <?php echo $rows['source'];?>
            </h3>

            <h3>
              Destination:
              <?php echo $rows['destination'];?>
            </h3>
            <h3>
              Date:
              <?php echo $rows['date'];?>
            </h3>
            <h3>
              Time:
              <?php echo $rows['time'];?>
            </h3>

            <a href="tel:<?php echo $rows['number'];?>"
              ><button class="btn"><img src="call.png" alt="" /></button
            ></a>
          </div>
        </div>
      </div>
      <?php
				}
			?>
      <?php
      include 'db_cred.php';
  $conn = mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname);

  // Check connection
  if ($conn == false) {
      die("ERROR: Could not connect. "
          . mysqli_connect_error());
  }

  date_default_timezone_set('Asia/Kolkata');
  $date = date('y-m-d');
  $time = date("G:i:s");


  $sql = "DELETE FROM registration WHERE date <= '$date' AND '$time'>= time";
      $result = mysqli_query($conn, $sql); ?>
    </div>
  </body>
</html>
