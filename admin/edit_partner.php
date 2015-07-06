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
<body id="admin_body">
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
				<h3>ახალი პარტნიორის დამატება:</h3>
				<h4>გთხოვთ შეავსოთ ყველა ველი და დააჭიროთ ღილაკს "დადასტურება"</h4>
		</div>
		<?php 
			$query1 = "SELECT * FROM partners WHERE id = '$post_id'";
			$run1   = mysqli_query($conn,$query1);

			while($row1 = mysqli_fetch_array($run1)){
			 	$id   	  = $row1['id'];
			 	$country1 = $row1['name'];
			 	$image    = $row1['flag_url'];
			}
		?>		
		<div class="col-md-12" id="form_admin">
			<form method="post" action="" enctype="multipart/form-data">
			  <div class="form-group">
			    <label>პარტნიორი ქვეყნის დასახელება</label>
			    <input type="text" class="form-control" name="country" value="<?php echo $country1 ;?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputFile">ატვირთეთ პარტნიორი ქვეყნის დროშა</label>
			    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
			  </div>
			  <button type="submit" name="submit" class="btn btn-default">დადასტურება</button>
			</form>
		</div>

	</div>
<?php 
	if(isset($_POST['submit'])){
		$country	= $_POST['country'];
		$img  		= $_FILES['image'];

		if(empty($country)){
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
			        move_uploaded_file($file_tmp,"..//img/".$file_name);
			        $query2 = "UPDATE partners SET flag_url = '$file_name', name ='$country' where id='$post_id'";
			        $run2   =  mysqli_query($conn,$query2);
			        header('Location: partners.php');

			    }else{
			        print_r($errors);
			    }
			}
		}
	}
?>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

