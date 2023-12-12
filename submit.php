<?php 
include 'Includes/dbcon.php';
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
$branch1=$_SESSION['branch'];
$section1=$_SESSION['section'];
$sql = "SELECT * FROM `students` where branch='$branch1' and section='$section1'";
$result = $connection->query($sql);
$date= date("Y-m-d");
if(!$result){
    die("Invalid query: ".$connection->error);
}
$s=0;

//fetching data from database
$statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Attendance has been taken for today!</div>";
while($row = $result->fetch_assoc()){
    $s=$s+1;

    $val = $_POST[$s];
    $arr[$s]=$row['rollno'];
    $arrt[$s]=$row['class_conducted'];
    $arrs[$s]=$row['class_attend'];
    $arrn[$s]=$row['name'];
    $arrt[$s]=$arrt[$s]+1;
    $sum=$arrs[$s]+$val;
    
    
    $sql_1="UPDATE students SET `class_conducted`=$arrt[$s],`class_attend`=$sum,`today`=$val where rollno='$arr[$s]'";
    $sql_2="INSERT INTO `viewattend` (`rollno`, `name`, `section`, `branch`, `status`, `date`) VALUES ('$arr[$s]', '$arrn[$s]', '$section1', '$branch1', '$val', '$date')";
    $result2 = $connection->query($sql_2);
    if(mysqli_query($connection, $sql_1)){
        $statusMsg = "<h1>Attendance Taken Successfully!</h1>";
        
    } 
    else{
        $statusMsg = "<h1>An error Occurred!</h1>";
    }

}



echo "<div class='d-flex flex-row justify-content-center'><img src='confirmed.png' width='600px'><div>";
header('Refresh: 3; URL = dashboard.php');



//echo $statusMsg
?>
</html>