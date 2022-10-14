<!DOCTYPE html>
<html>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            function simmd5($string){
                return substr(md5($string),6).substr(md5($string),0,6);
            }

            function validateUser($username,$password){
                $dbconn = "mysql:host=localhost;dbname=testdb";
                $dbuser = "root";
                $dbpass = "";
                $pdo = new PDO($dbconn,$dbuser,$dbpass);
                $sql = "SELECT  Salt FROM Users WHERE  Username=?";
                $smt = $pdo->prepare($sql);
                $smt->execute(array($username)); // retreives salt value
                $salt = $smt->fetch();
                $salt = $salt['Salt'];
                if($salt == null){
                    return false;
                }

                $sql = "SELECT  UserID FROM Users WHERE  Username=? AND Password=?";
                $smt = $pdo->prepare($sql);
                $smt->execute(array($username,simmd5($password.$salt))); //execute the query
                if($smt->rowCount()){
                    return true; //record found, return true.
                }
                return false; //record not found matching credentials, return false
            }

            if (isset($_POST['password']) && !empty($_POST['password'])){
                if(validateUser($_POST['username'], $_POST['password'])){
                    echo "<br>User Found, Login Complete";
                }
                else{
                    echo "<br>User Not Found";
                }
            }
        ?>

        <form action="saltedlogin.php" method="post">
            <h1>Salted Login</h1>
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