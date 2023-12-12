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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <title>Document</title>
</head>
<body>
<style>
	@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600");
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
/* VARS */
/* MIXINS */
/* STYLE THE HTML ELEMENTS (INCLUDES RESETS FOR THE DEFAULT FIELDSET AND LEGEND STYLES) */





/* TOGGLE STYLING */
.toggle {
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  font-size: 16px;
  font-family: "Open Sans", "Helvetica", sans-serif;
  -webkit-font-smoothing: antialiased;
  margin: 0 0 1.5rem;
  box-sizing: border-box;
  font-size: 0;
  display: flex;
  flex-flow: row nowrap;
  justify-content: flex-start;
  align-items: stretch;
}
.toggle input {
  width: 0;
  height: 0;
  position: absolute;
  left: -9999px;
}
.toggle input + label {
  margin: 0;
  padding: 0.75rem 2rem;
  box-sizing: border-box;
  position: relative;
  display: inline-block;
  border: solid 1px #DDD;
  background-color: #FFF;
  font-size: 1rem;
  line-height: 140%;
  font-weight: 600;
  text-align: center;
  box-shadow: 0 0 0 rgba(255, 255, 255, 0);
  transition: border-color 0.15s ease-out, color 0.25s ease-out, background-color 0.15s ease-out, box-shadow 0.15s ease-out;
  /* ADD THESE PROPERTIES TO SWITCH FROM AUTO WIDTH TO FULL WIDTH */
  /*flex: 0 0 50%; display: flex; justify-content: center; align-items: center;*/
  /* ----- */
}
.toggle input + label:first-of-type {
  border-radius: 6px 0 0 6px;
  border-right: none;
}
.toggle input + label:last-of-type {
  border-radius: 0 6px 6px 0;
  border-left: none;
}
.toggle input:hover + label {
  border-color: #213140;
}
.toggle input:checked + label {
  background-color: #007bff;
  color: #FFF;
  box-shadow: 0 0 10px rgba(102, 179, 251, 0.5);
  border-color: #4B9DEA;
  z-index: 1;
}
.toggle input:focus + label {
  outline: dotted 1px #CCC;
  outline-offset: 0.45rem;
}
@media (max-width: 800px) {
  .toggle input + label {
    padding: 0.50rem 0.15rem;
    flex: 0 0 50%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}

/* STYLING FOR THE STATUS HELPER TEXT FOR THE DEMO */
.status {
  margin: 0;
  font-size: 1rem;
  font-weight: 400;
}
.status span {
  font-weight: 600;
  color: #B6985A;
}
.status span:first-of-type {
  display: inline;
}
.status span:last-of-type {
  display: none;
}
@media (max-width: 800px) {
  .status span:first-of-type {
    display: none;
  }
  .status span:last-of-type {
    display: inline;
  }
}
.heading{
  text-align: center;
  padding: 10px;
  font-family: 'Roboto Condensed', sans-serif;
  font-size:40px;

}
.texthead{
  font-size: 20px;
  font-weight: bold;
}
.textbody{
  font-size: 20px;
}
.btn-submit{
  font-size: 16px;
  font-family: "Open Sans", "Helvetica", sans-serif;
  padding:10px;
  font-size: 1rem;
}
.btn{
  color:#000000;
  border: 1px solid;
}
.btn-outline-success{
  
}

nav{
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
}
.submitbutton{
  color:#fff;
}
</style>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="footer.png" width="70%" height="" ></a>
  <form class="form-inline">
    <button onclick="window.location.href='logout.php'" class="btn btn-outline-success">Log Out</button>
  </form>
</nav>
<div class="container my-5">
    <h2 class="heading">Attendance for <?php echo $todaysDate = date("d-m-Y");?></h2>
    <br>
    <form action="submitedit.php" method="post">
    <table class="table">
      <thead>
        <tr>
          <th class="texthead">ID</th>
          <th class="texthead">Roll no</th>
          <th class="texthead">Name</th>
          <th class="texthead">Check</th>
          
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
        $s=0;
        //fetching data from database
        while($row = $result->fetch_assoc()){
            $s=$s+1;
            echo "<tr>
            <td class='textbody'>".$row['id']."</td>
            <td class='textbody'>".$row['rollno']."</td>
            <td class='textbody'>".$row['name']."</td>
            <td>
            <div class='toggle'>
            <input type='radio' name=$s value=1 id='$s+1'/>
            <label for='$s+1'>Present</label>
            <input type='radio' name=$s value=0 id='$s+2' checked='checked' />
            <label for='$s+2'>Absent</label>
          </div></td>
            </tr>";
            
        }
        ?>
        
      </tbody>
      
    </table>
    <br>
    <div class="d-flex flex-row justify-content-center">
                  <button type="submit" name="save" class="submitbutton btn-submit btn btn-primary">Update Attendance</button>
    </div>
      </form>
</div>
</body>
</html>