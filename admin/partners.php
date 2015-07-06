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
			<h4>პარტნიორების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_partner.php">დაამატეთ ახალი პარტნიორი</a></h4>
		</div>
		<div class="col-md-12">
		<?php
			$query1 = "SELECT * FROM partners";
			$run1   = mysqli_query($conn,$query1);

			while($row1 = mysqli_fetch_array($run1)){
				$img  = $row1['flag_url'];
				$name = $row1['name'];
				$id   = $row1['id'];

				echo '
						<div class="col-md-3" id="partner_wrap">
							<div class="col-md-12">
								<img src="..//img/'.$img.'" id="img_admin">
							</div>
							<div class="col-md-12" id="name_part_admin">
							'
								.$name.
							'</div>	
							<div class="col-md-12">
								<div class="col-md-6" id="edit_partner_admin">
									<a href="edit_partner.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
								</div>
								<div class="col-md-6" id="delete_partner_admin">
									<a href="delete_partner.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
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