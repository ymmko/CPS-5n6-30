<html>
    <head>
    <title>Lab 08 | JSON</title>	
	<meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <link rel = "stylesheet" href = "./lab04.css">
        <link rel = "stylesheet" href = "./lab03.css">
    </head>
    <body class = "bodystyle2" style = "text-align: center">
    <br><br>
        <div>
            <?php
                $json = file_get_contents("lab08.json");
                $data = json_decode($json, true);
                echo "<h2>Track</h2><br>";
                echo "<b>Artist:</b><br>" . $data['response']['data']['item']['track']['artist'] . "<br><br>";
                echo "<b>Title:</b><br>" . $data['response']['data']['item']['track']['title'] . "<br><br>";
		echo "<b>ID:</b><br>" . $data['response']['data']['item']['track']['id'] . "<br><br>";
                echo "<b>Album:</b><br>" . $data['response']['data']['item']['track']['album'] . "<br><br>";
                echo "<div><br><img height = '250' src = '" . $data['response']['data']['item']['track']['imageurl'] . "'></img><br><br></div>"
            ?>
        </div>
    </body>
</html>
