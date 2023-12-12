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
  /*
.btn{
      border-radius:10px;
      margin: 5px;
      font-weight: bold;
      color:#000000;
      border: 1px solid;
    }
    */
    nav{
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}
@media (min-width: 360px) {
    .edit-btn {
      margin-left:450%;
    }
}

@media (min-width: 768px) {
    .edit-btn {
      margin-left:1050%;
    }
}

@media (min-width: 1024px) {
  .edit-btn {
        margin-left:1960%;
    }
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
    
    <h2>
      <div class="d-flex flex-row">
      <div>Students List </div><div><a class='edit-btn btn btn-primary btn-sm' href='editabsent.php'>Edit</a></div>
      </div>
    </h2>
    
    

  
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Roll no</th>
          <th>Name</th>
          <th>No of Classes Attended</th>
          <th>Status</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
     
        
        //reading all row from database
        $branch1=$_SESSION['branch'];
        $section1=$_SESSION['section'];
        $sql = "SELECT * FROM `students` where branch='$branch1' and section='$section1' and today=0";
        $result = $connection->query($sql);
        
        if(!$result){
            die("Invalid query: ".$connection->error);
        }
        $status="";
        //fetching data from database
        while($row = $result->fetch_assoc()){
            if($row['today'] == 1){$status = "Present"; }else{$status = "Absent";}
            echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['rollno']."</td>
            <td>".$row['name']."</td>
            <td>".$row['class_attend']."</td>
            <td>".$status."</td>
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