<html>
    <head>
        <title>Lab 05 PHP</title>
        <meta http-equiv = "content-Type" content = "text/html; charset=UTF-8">
        <link rel = "stylesheet" href = "./lab03.css">
        <link rel = "stylesheet" href = "./lab04.css">
    </head>
    <body class = "bodystyle2" style = "text-align: left; padding-left:10px">
        <form action = "./lab05.php" method = "post">
            <h1>Please choose number of columns:</h1>
            <select name = "col">
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
            </select>
            <br><br>
            <h1>Please choose number of rows:</h1>
            <select name = "row">
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
            </select>
            <br><br><br>
            <input type = "submit" value = "Submit" class = "buttonstyle2"/>
        </form>
        <?php
            if(isset($_POST['col'], $_POST['row']))
            {
                $col = $_POST['col'];
                $row = $_POST['row'];
            }
            echo "<table border=\"2\">";
            for ($r = 1; $r <= $row; $r++)
            {
                echo'<tr>';
                for ($c = 1; $c <= $col; $c++)
                {
                    echo '<td>' .$c*$r.'</td>';
                }
                echo '</tr>';
            }
            echo"</table>";
            session_start();

            if(isset($_SESSION['views']))
            {
                $_SESSION['views'] = $_SESSION['views']+1;
            }
            else
            {
                $_SESSION['views'] = 1;
            }
            echo "View Count: ". $_SESSION['views'];
        ?>
    </body>
</html>
