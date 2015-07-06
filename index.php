<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
  <?php include 'db.php';?>
<div class="col-md-12" id="main_wrapp">
   <?php include 'menu.php';?>
<div class="header">
   <?php include 'slide.php';?>
</div>
<div class="valute_wrap">
  <?php include 'valute.php';?>
</div>
<div class="partners_title">
  <div class="container" >
    ჩვენი პარტნიორები
  </div>
</div>
<div class="partners">
  <div class="col-md-12">
  <?php 
    $query1 = "SELECT * FROM partners ORDER BY RAND() LIMIT 6";
    $run1   = mysqli_query($conn,$query1);

    while($row1 = mysqli_fetch_array($run1)){
      $img  = $row1['flag_url'];
      $name = $row1['name'];

      echo '
          <div class="col-md-2">
            <div class="col-md-12">
              <img src="img/'.$img.'" id="part_main_img">
            </div>
            <div class="col-md-12" id="partners_title">
             '.$name.'
            </div>
          </div>

      ';
    }

  ?>
  </div>
</div>
<?php include 'middle.php';?>
<div class="footer">
  <div class="col-md-12">
    <div class="container">
      Trans Iberia Transit LTD
    </div>
  </div>
</div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>