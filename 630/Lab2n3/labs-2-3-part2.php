<!-- Lab2&3 Part 2
     Group: 13

    -->
<html>
    <head>
        <title>Labs-2-3 Part 2</title>
    </head>
    <body>
        <p>Labs-2-3 Part 2</p>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "testnew";

            // Create connection
            try {
                $testconn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $testconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conn = new mysqli($servername, $username, $password, $dbname);

                // create tables with extra fields
                $sql1 = "CREATE TABLE StRec (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(30) NOT NULL,
                    lastname VARCHAR(30) NOT NULL,
                    email VARCHAR(50),
                    gender VARCHAR(7) NOT NULL,
                    reg_date TIMESTAMP
                    )";

                $sql2 = "CREATE TABLE Courses (
                    code VARCHAR(6) PRIMARY KEY,
                    coursename VARCHAR(30) NOT NULL,
                    instructor VARCHAR(30) NOT NULL,
                    room VARCHAR(6) NOT NULL,
                    department VARCHAR(10) NOT NULL,
                    prereq VARCHAR(10) DEFAULT 'None'
                    )";

                try {
                    echo "Attempting to create tables with extra fields:<br>";
                    if ($conn->query($sql1) === TRUE){
                        echo "Table Student Records created successfully<br>";
                    }
                    if ($conn->query($sql2) === TRUE){
                        echo "Table Courses created successfully<br>";
                    }
                }
                catch(Exception $e){
                    echo "Error creating table: ". $e->getMessage();
                }

                // insert more records into tables
                $sql1 = "INSERT INTO StRec (firstname, lastname, email, gender)
                    VALUES ('John', 'Smith', 'john.smith@ryerson.ca', 'male')";
                $sql2 = "INSERT INTO StRec (firstname, lastname, email, gender)
                    VALUES ('Jane', 'Doe', 'jane.doe@ryerson.ca', 'female')";
                $sql3 = "INSERT INTO StRec (firstname, lastname, email, gender)
                    VALUES ('Ethan', 'Winters', 'ethan.winters@ryerson.ca', 'male')";
                $sql4 = "INSERT INTO StRec (firstname, lastname, email, gender)
                    VALUES ('Mia', 'Winters', 'mia.winters@ryerson.ca', 'female')";
                $sql5 = "INSERT INTO Courses (code, coursename, instructor, room, department)
                    VALUES ('CPS101', 'Intro to App Dev','Prof. A', 'KHE305', 'ComSci')";
                $sql6 = "INSERT INTO Courses (code, coursename, instructor, room, department)
                    VALUES ('BIO109', 'Intro to Biology','Prof. B', 'DSQ02', 'ComSci')";
                $sql7 = "INSERT INTO Courses (code, coursename, instructor, room, department)
                     VALUES ('CPS109', 'Computer Science I','Prof. C', 'DSQ12', 'Sci')";
                $sql8 = "INSERT INTO Courses (code, coursename, instructor, room, department)
                     VALUES ('CPS209', 'Computer Science II','Prof. D', 'DSQ13', 'Sci')";
                try {
                    echo "<br><br>Attempting to insert more records:<br>";
                    if ($conn->query($sql1) === TRUE){
                        echo "Record successfully added to StRec table<br>";
                    }
                    if ($conn->query($sql2) === TRUE){
                        echo "Record successfully added to StRec table<br>";
                    }
                    if ($conn->query($sql3) === TRUE){
                        echo "Record successfully added to StRec table<br>";
                    }
                    if ($conn->query($sql4) === TRUE){
                        echo "Record successfully added to StRec table<br>";
                    }
                    if ($conn->query($sql5) === TRUE){
                        echo "Record successfully added to Courses table<br>";
                    }
                    if ($conn->query($sql6) === TRUE){
                        echo "Record successfully added to Courses table<br>";
                    }
                    if ($conn->query($sql7) === TRUE){
                        echo "Record successfully added to Courses table<br>";
                    }
                    if ($conn->query($sql8) === TRUE){
                        echo "Record successfully added to Courses table<br>";
                    }
                }
                catch(Exception $e){
                    echo "Error inserting record: ". $e->getMessage();
                }

                // delete records based on specific keys
                $sql1 = "DELETE FROM StRec WHERE firstname='Jane' AND lastname='Doe'";
                $sql2 = "DELETE FROM Courses WHERE code='CPS209' AND instructor='Prof. D'";
                try {
                    echo "<br><br>Attempting to delete specific records:<br>";
                    if ($conn->query($sql1) === TRUE){
                        echo "Successfully deleted Jane Doe's record from StRec<br>";
                    }
                    if ($conn->query($sql2) === TRUE){
                        echo "Successfully deleted Prof. D's CPS209 Course from Courses<br>";
                    }
                }
                catch(Exception $e){
                    echo "Error deleting record: ". $e->getMessage();
                }
                
                // display various fields (using different primary keys) from various records using select
                $sql1 = "SELECT id, firstname, lastname, email FROM StRec WHERE id='1'";
                $sql2 = "SELECT id, firstname, lastname, gender FROM StRec WHERE id='3'";
                
                try {
                    echo "<br><br>Attempting to show various fields using different primary keys:<br>";
                    $result = $conn->query($sql1);
                    $data = $result->fetch_assoc();
                    echo "ID: " . $data["id"]. " - Name: " . $data["firstname"]. " " . $data["lastname"]. " - Email: " . $data["email"]."<br>";
                    $result = $conn->query($sql2);
                    $data = $result->fetch_assoc();
                    echo "ID: " . $data["id"]. " - Name: " . $data["firstname"]. " " . $data["lastname"]. " - Gender: " . $data["gender"]."<br>";
                }
                catch(Exception $e){
                    echo "Error displaying record: ". $e->getMessage();
                }

                mysqli_close($conn);
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        ?> 
    </body>
</html>

