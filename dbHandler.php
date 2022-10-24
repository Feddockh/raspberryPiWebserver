<?php

// Server parameters
$servername = "localhost";
$username = "vce";
$password = "Volvo1927";
$dbname = "vce";

// Establish connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Submit new data if names are posted
if (array_key_exists('firstname', $_POST)) {

    // Store name data to variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Insert data into a table
    $sql = "INSERT INTO scoreboard (firstname, lastname) 
        VALUES ('" . $firstname . "', '" . $lastname . "')"; // Formatting odd, had to pass strings
    if ($connection->query($sql) == TRUE) {
        echo "Table data inserted successfully<br>";
    } else {
        echo "Error inserting table data: " . $connection->error . "<br>";
    }
}

// Retrieve table data in order
$sql = "SELECT firstname, lastname, time, score FROM scoreboard ORDER BY score ASC";
$result = $connection->query($sql);
if($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "  Time: " . $row["time"] . "<br>";
    }
} else {
    echo "0 results";
}

/*
Next step is to figure out how to get the time to be entered into the database under the correct name
Idea might be to rewrite everything and use 'sessions' to transfer data between php files
Maybe also try to use a while loop in the clockhandler and use the post array to end the loop once the task is done and then you have the accumulated time
*/

?>