<?php 
include 'Includes/dbcon.php';
include 'Includes/session.php';
?>

<?php
/*
// Make sure you have established a valid database connection before this point

// Reading all rows from the database
$branch1 = $_SESSION['branch'];
$section1 = $_SESSION['section'];
$sql = "SELECT * FROM `students` WHERE branch='$branch1' AND section='$section1' AND today=0";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}


while ($row = $result->fetch_assoc()) {
*/
if (isset($_POST['ok'])) {
    $mobile = $_POST['mno'];
    
    // Authorisation details.
    $username = "mahendratejak8@gmail.com";
    $hash = "c6e3463ff6f6d7123a1a1c748d24c4e8ad0f3208187659a5d10bf5f41dd56e1e";
    
    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";
    
    // Data for text message.
    $sender = "TXTLCL";
    $numbers = $mobile; // Update to use the entered mobile number
    echo $numbers;
    $message = "This is a test message from the PHP API script.";
    $message = urlencode($message);
    $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
    
    $ch = curl_init('http://api.textlocal.in/send/');

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        echo 'API response: ' . $result;
    }
    curl_close($ch);
}
