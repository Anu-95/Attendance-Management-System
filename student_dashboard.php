<?php 
include 'Includes/dbcon.php';
include 'Includes/session.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body> 
<style> 
.btn{
      border-radius:10px;
      margin: 5px;
      font-weight: bold;
      color:#000000;
      border: 1px solid;
    }
    nav{
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}
.btn-outline-success{
  
}



</style>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="footer.png" width="70%" height="" ></a>
  <form class="form-inline">
    <button onclick="window.location.href='logout.php'" class="btn btn-outline-success">Log Out</button>
  </form>
</nav>  
<div id="sectionstudents">
<div class="container my-5">
    <h2>Students List</h2>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>Roll no</th>
          <th>Name</th>
          <th>Classes Conducted</th>
          <th>Classes Attended</th>
          <th>Percentage</th>
          <th>Today</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $roll=$_SESSION['userid'];
        
        //reading all row from database
        $sql = "SELECT * FROM `students` WHERE rollno='$roll'" ;
        $result = $connection->query($sql);

        if(!$result){
            die("Invalid query: ".$connection->error);
        }
        
        //fetching data from database
        while($row = $result->fetch_assoc()){
            $percentage = round(($row['class_attend'] / $row['class_conducted']) * 100);
            if($row['today'] == 1){$status = "Present";}else{$status = "Absent";}
            echo "<tr> 
            <td>".$row['rollno']."</td>
            <td>".$row['name']."</td>
            <td>".$row['class_conducted']."</td>
            <td>".$row['class_attend']."</td>
            <td>".$percentage."%</td>
            <td>".$status."</td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
</div>
</div>
</body>

</html>