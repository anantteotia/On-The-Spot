<?php session_start(); 
 include('logincheck.php');?>

<link rel="stylesheet" href="create.css" />

<html lang="en">


  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>On The Spot</title>
    <div class="navbar">
      <div class="nav-logo"><span class="logo-text">On The Spot</span></div>
      <div class="nav-links">
        <a href="index.php">Home</a>

        <a href="">Hello, <?php echo $_SESSION['username']?>
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
    <div class="login-box">
      <h2>Post</h2>
      <form id="form" method="post" action="connect.php">
        <div class="user-box">
          <input  required="True" type="text" name="source"/>
          <label>From</label>
        </div>
        <div class="user-box">
          <input required type="text" name="destination" />
          <label>Destination</label>
        </div>
        <div class="user-box">
          <input required type="number" name="number" required/>
          <label>Contact No.</label>
        </div>
        
        <div class="user-box">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        var today = new Date();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var year = today.getFullYear();
        var date = year + '-' + month + '-' + day;
        $('[id*=txtdateofreservation]').attr('min', date);
    });
</script>
          <input required type="date" id = "txtdateofreservation"name="date" required />
          <label>Date</label>
        </div>
        <div class="user-box">
          <input required type="time" name="time" required/>
          <label>Time</label>
        </div>
        <a
        >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <style>
            #tran {
              background: transparent;
              border: 0ch;
              color: #03e9f4;
              letter-spacing: 1px;
              font-size: large;
              font-family: sans-serif;
            }
            #tran:hover {
              color: white;
            }
          </style>
          <button id="tran" type="submit">POST</button>
        </a>
      </form>
    </div>
  </body>
</html>
