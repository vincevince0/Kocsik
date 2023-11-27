<?php

function getCsvData($filename) {
    if (!file_exists($filename)) {
        echo "$filename nem található";
        return false;
    }
    $csvFile = fopen($filename, 'r');
    $lines = [];
    while (! feof($csvFile)) {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);

    return $lines;
}

?>