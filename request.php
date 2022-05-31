
<?php
session_start();

if(isset($_POST['submit'])){

    $conn= mysqli_connect("localhost","root","","chat");

    if (isset($_SESSION['unique_id'])){

        $id =$_SESSION['unique_id'];
        
        $con = mysqli_connect('localhost', 'root', '', 'chat');
        $sql = "SELECT * FROM register WHERE unique_id =$id";
    
        $result = mysqli_query($con , $sql) or die( mysqli_error($con));
        $line = mysqli_fetch_array($result);


$nicno = $line['nicno'];
$name = $line['fname']." ".$line['lname'];
$position = mysqli_real_escape_string($conn,$_POST['position']);
$department = mysqli_real_escape_string($conn,$_POST['department']);
$leavetype = mysqli_real_escape_string($conn,$_POST['leavetype']);
$startdate = mysqli_real_escape_string($conn,$_POST['date']);
$nodate = mysqli_real_escape_string($conn,$_POST['nodays']);
$reson = mysqli_real_escape_string($conn,$_POST['reason']);


$query="INSERT INTO request (nicno ,ename,  position , department, leavetype, startdate, nodate, reson)
VALUES('{$nicno}', '{$name}',  '{$position}', '{$department}',  '{$leavetype}', '{$startdate}', '{$nodate}', '{$reson}')";

$result = mysqli_query($con, $query);
if ($result){
// if successful

header("location:request.php");

        

}else{

   echo'<script> alert("Process is Falied, Please try again")</script>';


}

 

    }



}

if (isset($_SESSION['unique_id'])){

    $id =$_SESSION['unique_id'];
    
    $con = mysqli_connect('localhost', 'root', '', 'chat');
    $sql = "SELECT * FROM register WHERE unique_id =$id";

    $result = mysqli_query($con , $sql) or die( mysqli_error($con));
    $line = mysqli_fetch_array($result);

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave request</title>
    <link rel="stylesheet" href="request.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
  
    <div class="wrapper">


        <div class="topic-bar">
    
            <p class="topic-text">Leave Manegement System</p>
            </div>
            
            
<table class="table">
<tr>
<td>

<div class="col-sm-9">

<table class="table table-success table-striped" >
<h3>Personal Information</h3>
<tr>

<td>
    Name
</td>
<td>
<?php echo $line['fname']." ".$line['lname']; ?>

</td>

</tr>

<tr>

<td>
    NIC No
</td>
<td>
<?php echo $line['nicno']; ?>

</td>

</tr>
<tr>

<td>
    Email Address
</td>
<td>
<?php echo $line['email']; ?>

</td>

</tr>
</table>

</div>




</td>




<td>

<table class="table table-success table-striped" id="leave">
    <h3>Leave Details</h3>
    

<tr>
<td>
 <p class="t-txt">Total</p>   
</td>
<?php

$con = mysqli_connect('localhost', 'root', '', 'chat');
$sql = "SELECT * FROM leavecount WHERE id=1";

$result = mysqli_query($con , $sql) or die( mysqli_error($con));
$line = mysqli_fetch_array($result);


echo"<td>".$line['total']."</td>";
?>
</tr>

<tr>
<td>
    <p class="a-txt">
    Alrady Taken Leaves
    </p>
    
</td>

<?php

if (isset($_SESSION['nicno'])){

    $nic = $_SESSION['nicno'];

    $con = mysqli_connect('localhost', 'root', '', 'chat');
    $sql= "SELECT SUM(nodate) AS count FROM request WHERE (YEAR(startdate) = YEAR(CURDATE())) AND (nicno = '$nic') ";
    
    $duration = $con->query($sql);
    $record = $duration->fetch_array();
    $total = $record['count'];

   echo"<td>".$total."</td>";

}

?>


</tr>

<tr>
<td>
    <p class="av-txt">

    Available Leaves
    </p>
    
</td>
<td id="valueav"><?php echo $line['total'] - $total  ?></td>

</tr>


</table>


</td>




</tr>
</table>







            


            
            
        

        <table class="table" id="formdata">
    
    
        <tr>
    
       
    
        <td>
      

        <section class=" form login">
    
    <form action="request.php" method="POST" >
    
    
    
  <h2 >Request Leave</h2>
    
    <div class="feilds input">
        <label>NIC No</label>
      <?php
    if (isset($_SESSION['unique_id'])){

        $id =$_SESSION['unique_id'];
        
        $con = mysqli_connect('localhost', 'root', '', 'chat');
        $sql = "SELECT * FROM register WHERE unique_id =$id";
    
        $result = mysqli_query($con , $sql) or die( mysqli_error($con));
        $line = mysqli_fetch_array($result);
    
    
       
        echo"<input type='text' disabled  name = 'nicno' value='".$line['nicno']."'>";
    }
       ?>
    </div>
    
    <div class="feilds input">
        <label>Name</label>
        
        <?php
    if (isset($_SESSION['unique_id'])){

        $id =$_SESSION['unique_id'];
        
        $con = mysqli_connect('localhost', 'root', '', 'chat');
        $sql = "SELECT * FROM register WHERE unique_id =$id";
    
        $result = mysqli_query($con , $sql) or die( mysqli_error($con));
        $line = mysqli_fetch_array($result);
    
    
       
        echo"<input type='text' disabled  name ='name' value='".$line['fname']." ".$line['lname']."'>";
    }
       ?>
    
    </div>

    <div class="feilds input">
        <label>Position</label>
        <select name="position"  class="item-select">
            <option value="Senior Lec">Senior Lecture</option>
            <option value="dimo">dimostrator</option>
            <option value="clark">Clark</option>
            <option value="other">Other</option>
          </select>
       
    
    </div>


    <div class="feilds input">
        <label>Department</label>
        <select name="department"  class="item-select">
                    
                    <?php
    
    $conntection= mysqli_connect("localhost","root","","chat");
    $sql = "SELECT * FROM department ";
    $result = mysqli_query($conntection,$sql);
    while($row=mysqli_fetch_array($result)){
    
    
    echo"<option value='".$row['department']."'>".$row['department']."</option>";
    
    }
    ?>
    
                      </select>
    
    </div>


    <div class="feilds input">
        <label>Leave Type</label>
        <select name="leavetype"  class="item-select">
            <option value="sick">Sick Leave</option>
            <option value="other">Other</option>
         
          </select>
       
    
    </div>

    <div class="feilds input">
        <label>Start Date</label>
        <input type="date" id="" name="date">
       
    
    </div>

    <div class="feilds input">
        <label>No Of Days</label>
        <input type="text" name = "nodays" placeholder="Enter No Of Days">
       
    
    </div>


    <div class="feilds input">
        <label>Reason</label>
        <textarea id="w3review" name="reason" rows="4" cols="50"></textarea>
       
    
    </div>






    


    
    
    
    <div class="feilds button ">
        
        <input type="submit" onclick="return confirm('Do you want to submit leave request?')"  value="Request" name="submit">
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
    </form>
    
    
            </section>

        </td>
       

        <td>

        
        <table class="table">

        <h2>Leave Information</h2>

<tr>
    <th>Reason</th>
    <th>Date</th>
    <th>Number of dates</th>
    
</tr>
<?php


$connection = mysqli_connect('localhost', 'root', '', 'chat');
if (isset($_SESSION['unique_id'])){

    $id =$_SESSION['unique_id'];
    
    $con = mysqli_connect('localhost', 'root', '', 'chat');
    $sql = "SELECT * FROM register WHERE unique_id =$id";

    $result = mysqli_query($con , $sql) or die( mysqli_error($con));
    $line = mysqli_fetch_array($result);


$nicno = $line['nicno'];

$sql = "SELECT * FROM request  WHERE (YEAR(startdate) = YEAR(CURDATE())) AND (nicno = '$nic')  ";
$result = mysqli_query($connection , $sql);
while($row = mysqli_fetch_array($result)){


echo"<tr>";
   echo" <td>".$row['reson']."</td>";
   echo" <td>".$row['startdate']."</td>";
    echo"<td>".$row['nodate']."</td>";
echo"</tr>";
}
}
?>

</table>


        

        

        </td>
       
    
       
    
    
    
    
    
        
    
    
        </tr>
       
    
    
    
    
        </table>
    
    
       
    
    
    </div>
    




</body>



</html>