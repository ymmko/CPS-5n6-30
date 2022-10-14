<!DOCTYPE html>
<html>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            if (isset($_POST['password']) && !empty($_POST['password'])){
                function insertUser($username,$password){
                    $dbconn = "mysql:host=localhost;dbname=testdb";
                    $dbuser = "root";
                    $dbpass = "";
                    $pdo = new PDO($dbconn,$dbuser,$dbpass);
                    $sql = "INSERT INTO Users(Username,Password) VALUES(?,?)";
                    $smt = $pdo->prepare($sql);
                    $smt->execute(array($username,$password)); //execute the query
                }

                insertUser($_POST['username'], $_POST['password']);
            }
        ?>

        <form action="noalgoreg.php" method="post">
            <h1>No Algorithm Register</h1>
            <p>Username</p>
            <input type="text" name="username">
            <br><br>
            <p>Password</p>
            <input type="text" name="password">
            <br><br>
            <input type="submit" >
        </form>
        <br><br>
        <button onclick="window.location='index.php';">Return</button>
    </body>
</html>