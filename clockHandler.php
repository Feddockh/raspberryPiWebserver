<?php
session_start();

// jQuery is calling to update the time
if (array_key_exists('time', $_POST)) {

    // Check to see if the game is active
    $output = null;
    $result_code = null;
    // Added 'www-data ALL=(ALL)    NOPASSWD: ALL' to the visudo file from terminal
    // This lets me run this script with root user privileges, but that might be bad
    // If this output says 'active', then the timer should be running
    exec('sudo /bin/python /var/www/html/gpioInput.py', $output, $result_code);
    
    // If both the game status is active and the time is 0, then we will begin the timer
    // If the game is inactive and the time is not 0, stop the clock and send out the result
    // If the game status is inactive, then the time will be 0
    // In the last case, the game must be active, and the time cannot be 0, so we  will increment the timer
    if ($output[0] == "active" && $_POST['time'] == '00:00') {
        // This needs to set and save the start time somehow
        setStartTime();
        echo '00:01';
    } elseif ($output[0] == "inactive" && $_POST['time'] != '00:00') {
        $command = "php tableHandler.php " . "'" . $_POST['time'] . "'";
        exec($command);
        echo '00:00';
        destroyStartTime();
    } elseif ($output[0] == "inactive") {
        echo '00:00';
    } else {
        // This should be changed to difference between start time and current time
        $totalSeconds = time() - getStartTime();
        formatClock($totalSeconds);
    }
    
}

function setStartTime() {
    $filename = "startTime.txt";
    $fileAddress = fopen($filename, "w") or die("Unable to open file");
    fwrite($fileAddress, time());
    fclose($fileAddress);
}

function getStartTime() {
    $filename = "startTime.txt";
    if (file_exists($filename)) {
        $fileAddress = fopen($filename, "r") or die("Unable to open file");
        $startTime = fread($fileAddress, filesize($filename));
        return $startTime;
    }
}

function destroyStartTime() {
    $filename = "startTime.txt";
    unlink($filename);
}

// Increments the formatted clock time
function incrementClock($time) {
    // Break down formatted clock time into total seconds passed
    $minutes = intval(substr($time, 0, 2));
    $seconds = intval(substr($time, 3, 2));
    $totalSeconds = $minutes * 60 + $seconds;
    
    // Increment the total seconds passed by 1
    $totalSeconds++;

    // Convert the total seconds back into the formatted clock time
    $seconds = $totalSeconds % 60;
    $minutes = ($totalSeconds - $seconds) / 60;

    // include padded zeros on output
    if ($minutes < 10) echo '0';
    echo $minutes . ":";
    if ($seconds < 10) echo '0';
    echo $seconds;
}

// Take seconds and convert to the formatted clock time
function formatClock($totalSeconds) {

    // Convert the total seconds back into the formatted clock time
    $seconds = $totalSeconds % 60;
    $minutes = ($totalSeconds - $seconds) / 60;

    // include padded zeros on output
    if ($minutes < 10) echo '0';
    echo $minutes . ":";
    if ($seconds < 10) echo '0';
    echo $seconds;
}

?>