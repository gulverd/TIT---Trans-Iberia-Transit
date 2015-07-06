<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="..//css/bootstrap.min.css" rel="stylesheet">
    <link href="..//style.css" rel="stylesheet">
  </head>
<body>
<?php include '..//db.php';?>
<?php include 'nav_admin.php';?>
<?php
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    $parse  = parse_url($url, PHP_URL_QUERY);
    $post_id = substr($parse,0);
?>
<div class="col-md-12">
  <div class="container" id="form_main_wrapper_admin">
    <div class="col-md-12" id="hd_admin">
        <h3>ახალი სურათის დამატება:</h3>
          <h4>გთხოვთ შეავსოთ ყველა ველი და დააჭიროთ ღილაკს დადასტურება</h4>
    </div>
    <div class="col-md-12" id="form_admin">
        <form method="post" action="" enctype="multipart/form-data">
          <?php
            $query2 = "SELECT * FROM gallery WHERE id = '$post_id'";
            $run2   = mysqli_query($conn,$query2);

            while($row2 = mysqli_fetch_array($run2)){
              $p_name   = $row2['name']; 
            }
          ?>
          <div class="form-group">
            <label>სურათის დასახელება</label>
            <input type="text" class="form-control" name="pic_name" value="<?php echo $p_name;?>">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">ატვირთეთ სურათი</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="image">
          </div>
          <button type="submit" name="submit" class="btn btn-default">დადასტურება</button>
        </form>
    </div>
  <?php 
  if(isset($_POST['submit'])){
    $names  = $_POST['pic_name'];
    $img    = $_FILES['image'];
    $alb_id = $_POST['album_id'];

    if(empty($names)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{  
      if(isset($_FILES['image'])){
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp  = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];   
          $file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
          $extensions = array("jpeg","jpg","png");                   
          if(empty($errors)==true){
              move_uploaded_file($file_tmp,"..//gallery/".$file_name);
              $query1 = "UPDATE gallery SET name = '$names', url ='$file_name' WHERE id = '$post_id'";
              $run1   =  mysqli_query($conn,$query1);
              header('Location: gallery.php');

          }else{
              print_r($errors);
          }
      }
    }
  }
?>
  </div>
</div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </html>

