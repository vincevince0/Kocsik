<?php

require_once('csv-tools.php');
ini_set('memory_limit', '-1');

$filename = "car-db.csv";
$csvData = getCsvData($filename);
if (empty($csvData)) {
    echo 'A fájl nem található';
    return false;
}

/*
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
*/

$makers = getMakers($csvData);

print_r($makers);

?>