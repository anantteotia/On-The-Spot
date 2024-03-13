<?php session_start(); 
 include('logincheck.php');?>

<html lang="en">
  <link rel="stylesheet" href="cards.css" />
  <link rel="stylesheet" href="index.css" />
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <div class="navbar">
      <div class="nav-logo"><span class="logo-text">On The Spot</span></div>
      <div class="nav-links">
        <a href="index.php">Home</a>

        <a href=""
          >Hello, 
          <?php echo $_SESSION['username']?>
        </a>
        <a href="logout.php">logout</a>
      </div>
      <div class="nav-cta"></div>
    </div>
  </head>
  <body>
    <?php
    include 'db_cred.php';
$name = $_SESSION['username'];
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword,$dbname);
if ($mysqli->connect_error) { die('Connect Error (' . $mysqli->connect_errno .
    ') '. $mysqli->connect_error); } $sql = "Select * from registration where
    name='$name'"; $result = $mysqli->query($sql); $mysqli->close(); ?>
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
            <form action="delete.php" method="post">
              <input
                style="display: none"
                type="number"
                name="number"
                value="<?php echo $rows['number'];?>"
              />
              <input
                style="display: none"
                type="text"
                name="username"
                value="<?php echo $_SESSION['username']?>"
              />
              <style>
                .btn1 {
                  padding: 15px 15px;
                  position: absolute;
                  top: 10%;
                  right: 5%;
                }
              </style>
              <input type="image" class="btn1" src="delete.png" alt="submit" />
            </form>
            <a href="tel:<?php echo $rows['number'];?>"
              ><button class="btn"><img src="call.png" alt="" /></button
            ></a>
          </div>
        </div>
      </div>
      <?php
				}
			?>
    </div>
  </body>
</html>
