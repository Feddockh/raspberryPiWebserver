<?php

// jQuery is calling to update the score
// Server parameters
$servername = "localhost";
$username = "vce";
$password = "Volvo1927";
$database = "vce";

// Establish connection
$connection = new mysqli($servername, $username, $password, $database);

// Check if new names should be added
if (array_key_exists('firstname', $_POST)) {
    
    // Insert data into table
    $sql = "INSERT INTO scoreboard (firstname, lastname) 
        VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "')"; // Formatting odd, had to pass as strings using '' inside of the ""
    $connection->query($sql);
}

// Check if time is available be uploaded
if ($argv[1] != null) {

    // UPDATE statement can be used to update existing records in a table
    $time = $argv[1];
    $score = getScore($time);
    $sql = "UPDATE scoreboard SET time='" . $time . "', score=" . $score . " WHERE time IS NULL";
    if ($connection->query($sql) == TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . $connection->error . "<br>";
    }
    
}

// ORDER BY clause used to sort records in ascending order
$sql = "SELECT firstname, lastname, time, score FROM scoreboard ORDER BY score ASC LIMIT 10";
$result = $connection->query($sql);

// Begin the table by setting the headers for each column
if ($result->num_rows > 0) {
    $table = "
        <table border = 1> 
            <tr>
                <th> Rank </th>
                <th> Name </th>
                <th> Time </th>
            </tr>
    ";

    // Increment through each row and add the data under its respective header
    $i = 1;
    while ($row = $result->fetch_array()) {
        $table .= "
            <tr>
                <td>" . $i . "</td>
                <td>" . $row["firstname"] . " " . $row["lastname"] . "</td>
                <td>" . $row["time"] . "</td>
            </tr>
        ";
        $i++;
    }

    // Close the table and print it
    $table .= "</table";
    echo $table;
}

// Close database connection
$connection->close();

// Break down formatted clock time into total seconds passed
function getScore ($time) {
    $minutes = intval(substr($time, 0, 2));
    $seconds = intval(substr($time, 3, 2));
    return $minutes * 60 + $seconds;
}

?>