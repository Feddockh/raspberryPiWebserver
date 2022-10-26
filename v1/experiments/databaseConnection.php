<html>
<head>

    <?php
        // Server parameters
        $servername = "localhost";
        $username = "vce";
        $password = "Volvo1927";

        // Establish connection
        $connection = new mysqli($servername, $username, $password);

        // Validate connection
        if ($conection->connect_error) {
            die ("Connection failed: " . $connection->connect_error) . "<br>";
        } else {
            echo "Connected succesfully<br>";
        }


        // Create a database
        $sql = "CREATE DATABASE IF NOT EXISTS vce";
        if ($connection->query($sql) == TRUE) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . $connection->error . "<br>";
        }

        // Close connection early (if needed)
        $connection->close();

        // Create a new connection in database
        $dbname = "vce";
        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($conection->connect_error) {
            die ("Connection failed: " . $connection->connect_error) . "<br>";
        } else {
            echo "Connected succesfully<br>";
        }


        // Create a table
        // Could also say CREATE TABLE IF NOT EXISTS ...
        $sql = "CREATE OR REPLACE TABLE scoreboard (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            time VARCHAR(10),
            score INT(6)
            )";
        if ($connection->query($sql) == TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error . "<br>";
        }


        // Insert data into a table
        // It appears like you cannot insert data into an exsisting row
        // It also seems like you must have the not null data to make the row
        $sql = "INSERT INTO scoreboard (firstname, lastname) 
            VALUES ('Hayden', 'Feddock')";
        if ($connection->query($sql) == TRUE) {
            echo "Table data inserted successfully<br>";
        } else {
            echo "Error inserting table data: " . $connection->error . "<br>";
        }


        // Prepared statements (protects against sql injections a little bit)
        $stmt = $connection->prepare("INSERT INTO scoreboard (firstname, lastname, time, score) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $firstname, $lastname, $time, $score);

        // Set parameters and execute
        $firstname = "Filip";
        $lastname = "Brajovic";
        $time = "5:30";
        $score = 5*60+30;
        $stmt->execute();

        $firstname = "Brian";
        $lastname = "Rudge";
        $time = "3:30";
        $score = 3*60+30;
        $stmt->execute();

        $firstname = "Bart";
        $lastname = "Sanders";
        $time = "4:00";
        $score = 4*60;
        $stmt->execute();

        $firstname = "Chris";
        $lastname = "Grove";
        $time = "4:30";
        $score = 4*60 + 30;
        $stmt->execute();

        echo "New records created successfully<br>";

        $stmt->close();


        // Selecting data
        // A * can be used in place of the column names to select all columns from the table
        $sql = "SELECT firstname, lastname, time FROM scoreboard";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>Time: " . $row["time"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        

        // Where clause is used to extract only records that fulfill a condition
        // to check if something is null you have to say "WHERE field IS NULL"
        $sql = "SELECT firstname, lastname, time FROM scoreboard WHERE firstname = 'Bart'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>Time: " . $row["time"] . "<br>";
            }
        } else {
            echo "0 results";
        }


        // ORDER BY clause can be used to sort records in ascending or descending order
        // Can omit ASC because that is the default, or can switch to DESC
        $sql = "SELECT firstname, lastname, time, score FROM scoreboard ORDER BY score ASC";
        $result = $connection->query($sql);

        if($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>Time: " . $row["time"] . "<br>";
            }
        } else {
            echo "0 results";
        }


        // DELETE statement can be used to delete records from a table
        $sql = "DELETE FROM scoreboard WHERE firstname = 'Chris'";

        if ($connection->query($sql) == TRUE) {
            echo "Record deleted successfully<br>";
        } else {
            echo "Error deleting record: " . $connection->error . "<br>";
        }


        // UPDATE statement can be used to update existing records in a table
        $sql = "UPDATE scoreboard SET time='6:00', score=6*60 WHERE id = 1";

        if ($connection->query($sql) == TRUE) {
            echo "Record updated successfully<br>";
        } else {
            echo "Error updating record: " . $connection->error . "<br>";
        }


        // LIMIT clause can be used to specify the number of records returned
        // Can also append OFFSET to select records between two points
        $sql = "SELECT firstname, lastname, time FROM scoreboard LIMIT 2";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>Time: " . $row["time"] . "<br>";
            }
        } else {
            echo "0 results";
        }

    ?>

</head>
</html>