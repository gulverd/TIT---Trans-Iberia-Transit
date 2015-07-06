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
		//echo $post_id;

?>
<div class="col-md-12">
	<div class="container" id="form_main_wrapper_admin">
		<div class="col-md-12" id="hd_admin">
				<h3>საკონტაქტო ინფორმაციის რედაქტირება:</h3>
				<h4>გთხოვთ შეავსოთ ყველა ველი და დააჭიროთ ღილაკს "დადასტურება"</h4>
		</div>
		<?php 
			$query1 = "SELECT * FROM contact WHERE id = '$post_id'";
			$run1   = mysqli_query($conn,$query1);

			while($row1 = mysqli_fetch_array($run1)){
			 	$id   = $row1['id'];
			 	$city = $row1['city'];
			 	$adrs = $row1['address'];
			 	$tel  = $row1['tel'];
			 	$mail = $row1['mail'];
			}
		?>
		<div class="col-md-12" id="form_admin">
			<form method="post" action="">
			  <div class="form-group">
			    <label>ქალაქი</label>
			    <input type="text" class="form-control" name="city" placeholder="მაგ: ქ.თბილისი" value="<?php echo $city;?>">
			  </div>
			  <div class="form-group">
			    <label>მისამართი</label>
			    <input type="text" class="form-control" name="adrs" placeholder="მაგ: ევდოშვილის ქ. N 19/5" value="<?php echo $adrs;?>">
			  </div>
			  <div class="form-group">
			    <label>ტელ/ფაქსი</label>
			    <input type="text" class="form-control" name="tel" placeholder="მაგ: + (995-32) 2923008; 2923631; 2348040;" value="<?php echo $tel;?>">
			  </div>
			  <div class="form-group">
			    <label>ელ-ფოსტა</label>
			    <input type="text" class="form-control" name="mail" placeholder="მაგ: tit@gol.ge " value="<?php echo $mail;?>">
			  </div>		  
			  <button type="submit" name="submit" class="btn btn-default">დადასტურება</button>
			</form>
		</div>

	</div>
<?php 
	if(isset($_POST['submit'])){
		$city	= $_POST['city'];
		$adrs   = $_POST['adrs'];
		$tel    = $_POST['tel'];
		$mail   = $_POST['mail'];

		if(empty($city) or empty($adrs) or empty($tel) or empty($mail)){
			echo "<div class='container'><p class='bg-danger' id='warn'>";
				echo 'გთხოვთ შეავსოთ ყველა ველი!';
			echo "</p></div>";
		}else{
			$query2 = "UPDATE contact SET city = '$city', address = '$adrs', tel = '$tel', mail = '$mail' where id = '$post_id'";
			$run2   = mysqli_query($conn,$query2);
			header('Location: contact_admin.php');
		
		}
	}
?>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

