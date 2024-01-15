<?php
require_once 'dbmaker.php';
header('Content-Type: application/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="makers.csv"');
$dbMaker = new DBMaker();
$makers = $dbMaker->getAll();
// Open a file in write mode
$csvFile = fopen('php://output','w');
fputcsv($csvFile,['id','name']);
foreach ($makers as $maker) {
    fputcsv($csvFile, $maker);
}
fclose($csvFile);