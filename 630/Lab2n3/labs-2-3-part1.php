<!-- Lab2&3 Part 1
     Group: 13

    -->
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
} else {
  echo "Error creating database: " . $conn->error;
}
$sql="USE myDB";
if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error using database: " . $conn->error;
  }
$sql = "CREATE TABLE IF NOT EXISTS `Lab2` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    data VARCHAR(500) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    function clear($conn){
        $deletesql = "DELETE FROM `Lab2`";
        if ($conn->query($deletesql) === TRUE) {
        } else {
          echo "Error: " . $deletesql . "<br>" . $conn->error;
        }
    }
    $arr = array();
    $genrearr = ["Abstract","Baroque","Gothic","Renaissance"];
    $typearr = ["Painting","Sculpture"];
    $subjectarr = ["Painting","Landscape","Portrait"];
    $specarr=["Commercial","Non-Commercial","Derivative Work","Non-Derivative Work"];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(array_key_exists('btn_reset',$_POST)){
            clear($conn);            
        }
        else{
            
            if(array_key_exists('btn_submit',$_POST)){
                $artWork = [
                    "Genre" => $genrearr[$_POST["genre"]],
                    "Type" => $typearr[$_POST["type"]],
                    "Subject" => $subjectarr[$_POST["subject"]],
                    "Specif" => $specarr[$_POST["specification"]],
                    "Year" => $_POST["year"],
                    "Museum" => $_POST["musuem"]
                ];
                $_POST=array();
                $arr[]=$artWork;
                $val = serialize($arr);
                $insertionquery="INSERT INTO `Lab2`(data) VALUES ('".$val."')";
                if ($conn->query($insertionquery) === TRUE) {
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        };
    }
    

?>
<html>
    <head>
        <title>Art Work Database</title>
        <link rel="stylesheet" type="text/css" href="../Lab1/lab1-Part1-Team%2313.css">
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;">
        <h1>About Art Work Database</h1>
        <p>Our Art Work Database includes pieces from all over the world in styles such as abstract, baroque, gothic, and renaissance.
        Types of art work consist of paintings (portrait or landscape) and sculptures, as well as specifications like commercial, non-commercial, derivative and non-derivative work.
        Find a variety of art works from the years of XXXX to YYYY, that are present in museums: 1, 2, 3, 4.</p><br>
        <div>
        <form style="text-align: center;" method="post">
            <label>Genre:</label>
            <select name="genre" id="genre">
                <option value="" disabled selected hidden>Please Choose...</option>
                <option value=0>Abstract</option>
                <option value=1>Baroque</option>
                <option value=2>Gothic</option>
                <option value=3>Renaissance</option>
            </select>
            

            <label>Type:</label>
            <select name="type" id="type">
                <option value="" disabled selected hidden>Please Choose...</option>
                <option value=0>Painting</option>
                <option value=1>Sculpture</option>
            </select>
            

            <label>Subject:</label>
            <select name="subject" id="subject">
                <option value="" disabled selected hidden>Please Choose...</option> 
                <option value=0>Painting</option>
                <option value=1>Landscape</option>
                <option value=2>Portrait</option>
            </select>
            

            <label>Specification:</label>
            <select name="specification" id="specification">
                <option value="" disabled selected hidden>Please Choose...</option>
                <option value=0>Commercial</option>
                <option value=1>Non-Commercial</option>
                <option value=2>Derivative Work</option>
                <option value=3>Non-Derivative Work</option>
            </select>
            

            <label>Year:</label>
            <input type="text" id="year"name="year" placeholder="YYYY" class="yearbox">
            

            <label>Museum:</label>
            <input type="text" id="musuem"name="musuem" placeholder="Enter museum name here"><br>
            <input type="submit" value="Submit" name="btn_submit">
            <input type="submit" value="Clear Form" name="btn_reset">
        </form>
        </div>
        
        <div style="padding: 70px 0;
         border: 3px solid green;
         text-align: center;">
            <?php
                $sql = "SELECT * FROM `Lab2`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $y=0;
                    while($row = $result->fetch_assoc()) {
                        $arttemp = unserialize($row["data"]);
                        echo $y."<br>";
                        $y=$y+1;
                        
                        foreach($arttemp[0] as $x=> $val){
                            echo $x.": ".$val."<br>";
                        }
                      }
                }
                else{
                    echo "No Art in database";
                }
            ?>
        </div>
    </body>
</html>