<!DOCTYPE HTML> 
<html>
<head>
<meta charset="UTF-8">
<style>
label {
    width:160px;
    margin-top: 3px;
    display:inline-block;
    float:left;
    padding:3px;
}
body {
    padding: 0px;
    margin: 0px;
   
}

p.info {
    font-size: 11px;
    margin: 0px;
    padding: 5px;
    color: red; 
    float: left;
}
.formcontainer {
    width: 400px;
    padding: 20px;
    margin: 0 auto;
}

</style>
</head>
<body> 
<div class="formcontainer">
<h2>Macmillan Annual Conference  2015</h2>
<p><span class="error">* აუცილებელი ველები.</span></p>
<form method="post"  name="payform" > 
    <label for="name">სახელი*:</label><input type="text" name="name">  <br><p class="info">სახელი შეიყვანეთ ლათინური ასოებით!</p>

    <br><br>
    <label for="name">გვარი*:</label><input type="text" name="surname" ><br>
    <p class="info">გვარი შეიყვანეთ ლათინური ასოებით!</p>
    <br><br>
    <label for="name">პირადი ნომერი*:</label><input type="text" maxlength="11" name="id"><br><br>
    <label for="name">ელ–ფოსტა*:</label><input type="text" name="email">
       <br><br>
    <label for="name">ტელეფონი*:</label><input type="tel" name="telephone"><br><br>
    <label for="name">აირჩიეთ რეგიონი*:</label> <select name="region"> 
                      <option value="3.5">თბილისი</option>
                      <option value="8">კახეთი</option>
                      <option value="8">მესტია</option>
                    </select>
       <br><br>
    <label for="name">მისამართი*:</label><input type="text" name="address">
      <br><br>
    <input type="submit" name="submit" value="გადახდა"> 
    </form>
</div>

</body>
<?php


    if(isset($_POST['submit'])){
      $name  = $_POST['name'];
      $surname = $_POST['surname'];
      $id    = $_POST['id'];
      $email = $_POST['email'];
      $tel   = $_POST['telephone'];
      $adrs  = $_POST['address'];
      $reg   = $_POST['region'];

    if(empty($name) or empty($id) or empty($surname) or empty($email) or empty($tel) or empty($reg) or empty($adrs)){
      echo "sagol";
      }else{
        echo "maili"; 
      }

   }
?>

</html>