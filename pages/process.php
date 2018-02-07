<?php
// Unescape the string values in the JSON array
print_r($tableData);

$tableData = stripcslashes($_POST['pTableData']);
print_r($tableData);
// Decode the JSON array
$tableData = json_decode($tableData, TRUE);
print_r($tableData);

// now $tableData can be accessed like a PHP array
echo "<br><br><br> RESULTS: " . var_dump($tableData) . "<br><br><br>";
?>