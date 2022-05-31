<?php
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$error="";
$sucsess ="";

if(isset($_POST['submit'])){

  if($uname == "admim"){

    if($pass == "pass"){

      $error="";
      $sucsess="Welcome Admin";
      header("Location:login.php");


    }
    else{

      $error="Inavlid Password";
      $sucsess ="";

    }


  }
  else{

    $error="Inavlid Username";
    $sucsess ="";
  }



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 
<div class="container">

<form action="" method="POST">
<div class="form-input">

Usename
<input type="text" name="uname"><br>

Password

<input type="text" name="pass">
<br>

<input type="submit" name="submit" value="Login">

</div>


</form>


</div>



</body>
</html>