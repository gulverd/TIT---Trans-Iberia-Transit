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
<div class="col-md-12">
  <div class="container" id="form_main_wrapper_admin">
    <div class="col-md-12" id="hd_admin">
        <h3>ფოტო გალერეა:</h3>
        <h4>ალბომის დასახელების და სურათის შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span></h4>
        <div class="col-md-6" id="admin_gallery_but">
          <h4><a href="add_new_album.php"><span class="glyphicon glyphicon-folder-open"></span>   ახალი ალბომის დამატება </a></h4>
        </div>
        <div class="col-md-6" id="admin_gallery_but">
          <h4><a href="add_new_pic.php"><span class="glyphicon glyphicon-plus"></span>   ახალი სურათის დამატება </a></h4>
        </div>
    </div>
    <div class="col-md-12" id="form_admin">
    <?php
      $query1 = "SELECT * FROM gallery_albums";
      $run1   = mysqli_query($conn,$query1);

      while($row1 = mysqli_fetch_array($run1)){
        $id    = $row1['id'];
        $name  = $row1['name'];
        $cover = $row1['cover'];

        echo '
          <div class="col-md-6">
            <a href="gallery_show.php?'.$id.'">
            <div class="col-md-12">
              <img src="..//gallery/albums/'.$cover.'" id="album_admin_pic">
            </div>
            <div class="col-md-12" id="album_admin_name">
              '.$name.'
            </div>
            </a>
            <div class="col-md-12">
              <div class="col-md-6" id="edit_partner_admin">
                <a href="edit_album.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
              </div>
              <div class="col-md-6" id="delete_partner_admin">
                <a href="delete_album.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
              </div>
            </div>
          </div>

        ';
      }
    ?>
    </div>
  </div>
</div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </html>