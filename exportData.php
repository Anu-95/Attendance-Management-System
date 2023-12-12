<?php 
 
// Load the database configuration file 
include_once 'Includes/dbcon.php'; 
 
// Fetch records from database 
$query = $connection->query("SELECT * FROM students ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "Todays_report_" . date('d-M-Y') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'ROLL NO', 'NAME', 'CLASSES CONDUCTED', 'CLASSES ATTENDED', 'BRANCH', 'SECTION', 'STATUS'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['today'] == 1)?'Present':'Absent'; 
        $lineData = array($row['id'], $row['rollno'], $row['name'], $row['class_conducted'], $row['class_attend'], $row['branch'], $row['section'], $status); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>