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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link src="https://hexcolor.co/generate-color-gradient">
    <title>Dashboard</title>
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
    body {
  margin: 0;
  font-family: "Lato", sans-serif;
}


.card{

  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  margin:1%;
  border-radius:10px;
  padding:5px;
  width:270px;
  cursor: pointer;
  
}
.text{
  text-align: center;
  padding:10px;
  font-family: 'Roboto Condensed', sans-serif;
  font-size:20px;
}
.card-text{
 
  font-family: 'Roboto Condensed';
  font-size:40px;
  padding:5px;
}
nav{
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}
.card-img{
  width: 100px;
  height: 100px;
  padding: 10px;
}
.btn-home{
  margin-top: 5%;
  padding: 15px;
  border-radius: 10px;
  font-family: sans-serif;
  font-weight: bold;
  font-size: 20px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  width:250px;
}
.btn{
      border-radius:10px;
      margin: 5px;
      font-weight: bold;
      color:#000000;
      border: 1px solid;
    }
.cardpara{
  font-size:20px;
  font-weight: bold;
  text-align:center;
}



</style>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="footer.png" width="70%" height="" ></a>
  <form class="form-inline">
    <a href="logout.php" class="btn btn-outline-success">Log Out</a>
  </form>
</nav>

  






<div >

<div class="text">
  <h1>Teacher's Dashboard</h1>
</div>
<div class="container-fluid ">
  
  <div class="row justify-content-center">
    <div onclick="window.location.href='students.php'" class="card min-card d-flex flex-row justify-content-center">
      <img class="card-img" src="students.png"  />
      <div>
        <h1 class="card-text">Students</h1>
        <?php
          
          $branch1=$_SESSION['branch'];
          $section1=$_SESSION['section'];
          $sql = "SELECT id FROM `students` where branch='$branch1' and section='$section1'";
          $result = $connection->query($sql);
  
          if(!$result){
              die("Invalid query: ".$connection->error);
          }        

          if (mysqli_num_rows($result) > 0) {
            $rowcount = mysqli_num_rows( $result );
            echo "<p class='cardpara'>$rowcount</p>";
            }
          else {
            echo "<p class='cardpara'>0</p>";
         }
        ?>
      </div>
    </div>
    
    <div onclick="window.location.href='present.php'" class="card min-card d-flex flex-row justify-content-center">
      <img class="card-img" src="students-present.png"  />
      <div>
        <h1 class="card-text">Present</h1>
        <?php
          $sql = "SELECT id FROM `students` where branch='$branch1' and section='$section1' and today=1";
          $result = $connection->query($sql);
  
          if(!$result){
              die("Invalid query: ".$connection->error);
          }        

          if (mysqli_num_rows($result) > 0) {
            $rowcount = mysqli_num_rows( $result );
            echo "<p class='cardpara'>$rowcount</p>";
            }
          else {
            echo "<p class='cardpara'>0</p>";
         }
        ?>
      </div>
    </div>
    <div onclick="window.location.href='absent.php'" class="card min-card d-flex flex-row justify-content-center">
      <img class="card-img" src="student-absent.png"  />
      <div>
        <h1 class="card-text">Absent</h1>
        <?php
          $sql = "SELECT id FROM `students` where branch='$branch1' and section='$section1' and today=0";
          $result = $connection->query($sql);
  
          if(!$result){
              die("Invalid query: ".$connection->error);
          }        

          if (mysqli_num_rows($result) > 0) {
            $rowcount = mysqli_num_rows( $result );
            echo "<p class='cardpara'>$rowcount</p>";
            }
          else {
            echo "<p class='cardpara'>0</p>";
         }
        ?>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid ">
  <div class="d-flex flex-row justify-content-center">
    <div>
      <button onclick="window.location.href='Take_attendance.php'" class="btn-primary btn-home m-3">Take Attendance</button>
    </div>
    <div>
    <button onclick="window.location.href='viewattendence.php'" class="btn-primary btn-home m-3">View Attendance</button>
    </div>
</div>
</div>
</div>


</body>
</html>