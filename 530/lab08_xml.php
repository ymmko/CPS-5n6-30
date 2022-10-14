<html>
    <head>
    <title>Lab 08 | XML</title>	
	<meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <link rel = "stylesheet" href = "./lab04.css">
        <link rel = "stylesheet" href = "./lab03.css">
    </head>
    <body class = "bodystyle2" style = "text-align: center">
    <br><br>
        <div>
            <?php
                $xml = simplexml_load_file("lab08.xml");
                echo "<h2>Track</h2><br>";
                echo "<b>Artist:</b><br>" . $xml->data->item->track->artist . "<br><br>";
                echo "<b>Title:</b><br>" . $xml->data->item->track->title . "<br><br>";
		echo "<b>ID:</b><br>" . $xml->data->item->track->id . "<br><br>";
                echo "<b>Album:</b><br>" . $xml->data->item->track->album . "<br><br>";
                echo "<div><br><img height = '250' src = '" . $xml->data->item->track->imageurl . "'></img><br><br></div>"
            ?>
        </div>
    </body>
</html>
