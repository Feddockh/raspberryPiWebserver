<?php
/*
    echo $start = $_POST['start'];
    echo "<br>";
    echo $currentTime = time();*/

    // Note: _POST only holds values momentarily
    
    /*
    if(array_key_exists('status', $_POST)) {
        if ($_POST['status'] == 'start') {
            if ($startTime == 0) $startTime = time();
            $timer = time() - $startTime;
        }

        if ($_POST['status'] == 'stop') {
            $startTime = 0;
        }
        
        
        echo $timer;
    }
    */

    static $startTime;

    if (array_key_exists('status', $_POST)) {
        if ($_POST['status'] == 'start') {
           $startTime = time();
        }
        if ($_POST['status'] == 'stop') {
            $startTime = 0;
        }
    }

    if ($startTime != 0) {
        
    }

    echo $startTime . "<br>";
    echo $timer = time() - $startTime;

    // Problem is that $startTime is destroyed each time, so we need to find a way to preserve the value
    

?>