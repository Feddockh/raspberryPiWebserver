<?php
    
    if (array_key_exists('startTime', $_POST)) {
        $startTime = floor($_POST['startTime']);
        if ($startTime != 0) {
            $timer = time() - $startTime;
        }
    }
    
    echo $timer;
?>