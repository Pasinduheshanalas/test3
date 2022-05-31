




<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userdetails.css">
    <title>Document</title>
    <script src="./javascript/userdetails.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
  
    <div class="container-fluid">

    <div class="topic-bar1">


<p class="topic-text1">Leave Manegement System</p>


</div>    <div class="head-bar">
    
    <table class="table">
    
    <tr>
    
    <td>
    <img src="background/home.png" alt="">
        <a class="nav-link" href="index.php">Home</a>
        </td>
    
        <td>
        <img src="background/register.png" alt="">
        <a class="nav-link" href="registration.php">Register</a>
        </td>
    
        <td>
        <img src="background/user.png" alt="">
        <a class="nav-link" href="#">User Details</a>
        </td>
    
        

        <td>
    <img src="background/department.png" alt="">
    <a class="nav-link" href="department.php">Department</a>
    </td>   



    <td>
    <img src="background/request.png" alt="">
    <a class="nav-link" href="recived_request.php">Requests</a>
    </td> 
    
   
    </tr>
    </table>
    
    </div>




<div class="row mt-3" id="row4">
                  <div class="form-group has-search">
                      <input type="text" onkeyup="search()" id="searchbox" class="form-control" placeholder="Search Profile by NIC">
                 </div>
            </div>

<div class="row mt-3">

<table class="table " id="Employee-details">

<tr>
    <th>Unique Id</th>
    <th>Name</th>
    <th>Nic</th>
    <th>email</th>
    <th>Image</th>

</tr>

<?php

$conntection= mysqli_connect("localhost","root","","chat");
$sql = "SELECT * FROM register ";
$result = mysqli_query($conntection,$sql);
while($row=mysqli_fetch_array($result)){

    $img = $row['img'];

echo'<tr>';
 echo   "<td>".$row['unique_id']."</td>";
 echo   "<td>".$row['fname']."</td>";
 echo   "<td>".$row['nicno']."</td>";
 echo   "<td>".$row['email']."</td>";
 echo   "<td><img src='./php/images/$img' id='picture'></td>";
 
echo'</tr>';
}
?>


</table>

</div>
            
</div>


</body>
</html>