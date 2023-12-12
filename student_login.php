<?php 
include 'Includes/dbcon.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>AMS - Login</title>
  

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <style>
body {
    margin: 0;
    font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #757575;
    text-align: left;
    background-color: #fff;
}
.text-center {
    text-align: center;
}

.card {
  
  border-radius: .375rem;
  width:400px;
  margin:5%;
    
}
.login-form{
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  padding:20px;
  border-radius: .375rem;
}
.card-body{
  padding:0px;
}
  </style>
  <div class="container-login">
    <div class="d-flex flex-row justify-content-center">
      <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="login.png" style="width:215px; height:170px">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Student Login</h1>
                  </div>
                  <form class="user" method="Post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" required name="username" id="exampleInputEmail" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name = "password" required class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary btn-block " value="Login" name="login" />
                    </div>
                     </form>
                    <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <?php
            
            
            if(isset($_POST['login'])){

              $username = $_POST['username'];
              $password = $_POST['password'];
          
          
              $query = "SELECT * FROM students WHERE rollno = '$username' AND rollno = '$password'";
              $rs = $connection->query($query);
              $num = $rs->num_rows;
              $rows = $rs->fetch_assoc();
              

          
              if($num > 0){

                $_SESSION['userid'] = $username;
                  
                 echo "<script type = \"text/javascript\">
                  window.location = (\"student_dashboard.php\")
                  </script>";
               }
               else {
                echo "<div class='alert alert-danger' class= role='alert'>
                Invalid Username/Password!
                </div>";
               }
            }
         ?>
</body>

</html>