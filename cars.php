<?php

require_once('csv-tools.php');
ini_set('memory_limit', '-1');

$filename = "car-db.csv";
$csvData = getCsvData($filename);
if (empty($csvData)) {
    echo 'A fájl nem található';
    return false;
}

$header = $csvData[0];
$idxMaker = array_search('make', $header);
$idxModel = array_search('model', $header);

$isHeader = true;

$result = [];
$maker = '';
$model = '';
foreach ($csvData as $data) {
    if (!is_array($data)) {
        continue;
    }
    if ($isHeader) 
    {
        $isHeader = false;
        continue;    
    }
    if ($maker != $data[$idxMaker]) {
        $maker = $data[$idxMaker];
    }
    if ($model != $data[$idxModel]) {
        $model = $data[$idxModel];
        $result[$maker][] = $model;
    }
}
print_r($result);


/*
$mysqli = new mysqli("localhost","my_user","my_password","my_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform queries and print out affected rows
$mysqli -> query("SELECT * FROM Persons");
echo "Affected rows: " . $mysqli -> affected_rows;

$mysqli -> query("DELETE FROM Persons WHERE Age>32");
echo "Affected rows: " . $mysqli -> affected_rows;

$mysqli -> close();
*/
?>