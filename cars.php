<?php


$header = [];
$lines = [];

$filename = "car-db.csv";

if (file_exists($filename)) {
    //echo "The file $filename exists";
    $csvFile = fopen($filename,"r");
    $header = fgetcsv($csvFile);
    while (! feof($csvFile)) 
    {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);
    return $lines;

} else {
    echo "The file $filename does not exist";
}

$keymaker = array_search('make', $header);







?>