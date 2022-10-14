<!DOCTYPE html>
<html>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            function simmd5($string){
                return substr(md5($string),6).substr(md5($string),0,6);
            }

            function generateRandomSalt(){
                return base64_encode(openssl_random_pseudo_bytes(12));
            }

            if (isset($_POST['password']) && !empty($_POST['password'])){
                function insertUser($username,$password){
                    $dbconn = "mysql:host=localhost;dbname=testdb";
                    $dbuser = "root";
                    $dbpass = "";
                    $pdo = new PDO($dbconn,$dbuser,$dbpass);
                    $salt = generateRandomSalt();
                    $sql = "INSERT INTO Users(Username,Password,Salt) VALUES(?,?,?)";
                    $smt = $pdo->prepare($sql);
                    $smt->execute(array($username,simmd5($password.$salt),$salt)); //execute the query
                }
                
                insertUser($_POST['username'], $_POST['password']);
            }

            
        ?>

        <form action="saltedreg.php" method="post">
            <h1>Salted Register</h1>
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