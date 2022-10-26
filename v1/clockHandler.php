<?php
$filename = "startTime.txt";
$timer = null;

if (array_key_exists('status', $_POST)) {
    if ($_POST['status'] == 'start') {
        $fileAddress = fopen($filename, "w") or die("Unable to open file");
        fwrite($fileAddress, time());
        fclose($fileAddress);
    }
    if ($_POST['status'] == 'stop') {
        unlink($filename);
    }
}

if (file_exists("startTime.txt")) {
    $fileAddress = fopen("startTime.txt", "r") or die("Unable to open file");
    $startTime = fread($fileAddress,filesize($filename));
    $timer = time() - $startTime;
}

echo $timer;

?>