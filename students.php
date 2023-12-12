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

    }
    .btn{
  
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
          <th>ID</th>
          <th>Roll no</th>
          <th>Name</th>
          <th>Classes Conducted</th>
          <th>Classes Attended</th>
          <th>Percentage</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php

        //reading all row from database
        
        
        $branch1=$_SESSION['branch'];
        $section1=$_SESSION['section'];
        $sql = "SELECT * FROM `students` where branch='$branch1' and section='$section1'";
        $result = $connection->query($sql);

        if(!$result){
            die("Invalid query: ".$connection->error);
        }
        $status="";
        //fetching data from database
        while($row = $result->fetch_assoc()){
            $percentage = round(($row['class_attend'] / $row['class_conducted']) * 100);
            if($row['today'] == 1){$status = "Present"; $colour="style='background: #00FF00; color:#000000;'";}else{$status = "Absent";$colour="style='background: #FF0000; color:#fff;'";}
            echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['rollno']."</td>
            <td>".$row['name']."</td>
            <td>".$row['class_conducted']."</td>
            <td>".$row['class_attend']."</td>
            <td>".$percentage."%</td>
            <td class='btn' $colour'>".$status."</td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
    <button onclick="window.location.href='dashboard.php'" class="btn-primary">back</button>
</div>
</div>
</body>
</html>