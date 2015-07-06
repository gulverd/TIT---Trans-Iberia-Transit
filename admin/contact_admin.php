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
			<h4>საკონტაქტო ინფორმაცის შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_office.php">დაამატეთ ახალი ოფისი</a></h4>
		</div>
		<div class="col-md-12">
			<table class="table table-striped">
			 	<tr id="table_adm">
			 		<td>
			 			<span class="glyphicon glyphicon-edit"></span>
			 		</td>
			 		<td>
			 			<span class="glyphicon glyphicon-trash"></span>
			 		</td>
			 		<td>
			 			ქალაქი
			 		</td>
			 		<td>
			 			მისამართი
			 		</td>
			 		<td>
			 			ტელ/ფასქსი
			 		</td>
			 		<td>
			 			ელ-ფოსტა
			 		</td>
			 	</tr>
			 	<?php
			 		$query1 = "SELECT * FROM contact";
			 		$run1   = mysqli_query($conn,$query1);

			 		while($row1 = mysqli_fetch_array($run1)){
			 			$id   = $row1['id'];
			 			$city = $row1['city'];
			 			$adrs = $row1['address'];
			 			$tel  = $row1['tel'];
			 			$mail = $row1['mail'];

					echo '<tr id="table_adm">
					 		<td id="edit">
					 			<a href="edit_office.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
					 		</td>
					 		<td>
					 			<a href="delete_office.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
					 		</td>
					 		<td>'.
					 			$city	
					 		.'</td>
					 		<td>'.
					 			$adrs
					 		.'</td>
					 		<td>'.
					 			$tel
					 		.'</td>
					 		<td>'.
					 			$mail
					 		.'</td></tr>';

			 		}
			 	?>
			</table>
		</div>
	</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>