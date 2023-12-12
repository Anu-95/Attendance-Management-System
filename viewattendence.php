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
  nav{
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
} 
.btn{
      border-radius:10px;
      margin: 5px;
      font-weight: bold;
      color:#000000;
      border: 1px solid;
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
    <h2>View Attendance</h2>
    <br>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="Class Arm Name">
                        </div>
                        <!-- <div class="col-xl-6">
                        <label class="form-control-label">Class Arm Name<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="classArmName" value="<?php echo $row['classArmName'];?>" id="exampleInputFirstName" placeholder="Class Arm Name">
                        </div> -->
                    </div>
                    <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
                  </form>
                </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Roll no</th>
          <th>Name</th>
          
          <th>Status</th>
          <th>date</th>
        </tr>
      </thead>
      <tbody>
        <?php

if(isset($_POST['view'])){
        $dateTaken=$_POST['dateTaken'];
        $branch1=$_SESSION['branch'];
        $section1=$_SESSION['section'];
        $sql = "SELECT * FROM `viewattend` where date='$dateTaken'";
        $rs = $connection->query($sql);
        $num = $rs->num_rows;
        $sn=0;
        $status="";
        if($num > 0){ 
        while ($row = $rs->fetch_assoc()){
          if($row['status'] == 1){$status = "Present"; }else{$status = "Absent";}
            echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['rollno']."</td>
            <td>".$row['name']."</td>
            <td>".$status."</td>
            <td>".$row['date']."</td>
            </tr>";
        } 
    }  
    else
    {
        echo   
        "<div class='alert alert-danger' role='alert'>
        No Record Found!
        </div>";
    }
}
  ?>
      </tbody>
    </table>
    
    <button onclick="window.location.href='dashboard.php'" class="btn-primary">back</button>
</div>
</div>
</body>
</html>