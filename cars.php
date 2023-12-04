<?php

require_once('csv-tools.php');
require_once('db-tools.php');
require_once('MakersDbTool.php');
ini_set('memory_limit', '-1');

$filename = "car-db.csv";
$csvData = getCsvData($filename);
if (empty($csvData)) {
    echo 'A fájl nem található';
    return false;
}



/*
$mysqli = new mysqli("localhost","root",null,"cars");
//check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL " . $mysqli -> connect_errno;
    exit();
}

echo "connected\n";
*/

$makersDbTool = new MakersDbTool();


$makers = getMakers($csvData);

$errors = [];
foreach ($makers as $maker)
{
    $result = $makersDbTool->createMaker($maker);
    if (!$result)
    {
        $errors[] = $maker;
    }
    echo "$maker\n";

}


$allMakers = $makersDbTool->getAllMakers();
$cnt = count($allMakers);
echo "$cnt sor van;\n";
echo $cnt . "sor van\n";
echo sprintf("%d sor van\n", $cnt);






print_r($makers);



foreach ($makers as $maker) {
    $mysqli->query("INSERT INTO cars (name) VALUES ($maker)");
    echo "$maker\n";
}


$mysqli->close();


?>