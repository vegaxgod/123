<?php

function downloadFile($path, $filename, $filesize = null, $headers = array()){

    $file = fopen($path, 'rb');

    header("Content-Type: application/actet-stream");
    header('Content-Disposition: attachment; filename="'.$filename.'"');

    if(isset($filesize)) header('Content-Length: '.$filesize);

    foreach($headers as $value) header($value);

    fpassthru($file);

    fclose($file);
}

$path = __DIR__."/../upload/".$_GET['file_name'];
$filename = $_GET['name'];
$filesize = filesize($path);
$headers = array(
    "Cache-Control: no-cache, no-store, musst-revalidate",
    "Pragma: no-cache",
    "Expires: 0"
);

downloadFile($path, $filename, $filesize, $headers);