<?php
    // Check raspberry pi GPIO
    //$command = escapeshellcmd('/bin/python /var/www/html/check.py');
    $output = null;
    $result = null;

    exec('/bin/python /var/www/html/check.py', $output, $result);


    $element = null;
    foreach( $output as $element ) {
        echo $element . '<br>';
    }

    $isnull = is_null($output[1]);
    echo $isnull . '<br>';

    $serial = serialize($output[1]);
    echo $serial   . '<br>';
    echo $result . '<br>';
    
    
?>