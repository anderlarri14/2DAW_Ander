<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Informacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    
    foreach ($info as $aux) {
        echo "<h1>". $aux['name'] ."</h1><br>";
        echo "City Population-->". $aux['Population']."<br>";
        echo "Country Code-->". $aux['CountryCode']."<br>";
        echo "Country name-->". $aux['countryName']."<br>";
        echo "Country population-->". $aux['countryPop']."<br>";
        echo "Continent-->". $aux['Continent']."<br>";
        echo "Country's capital-->". $aux['capital']."<br>";
    }
    
    ?>
    <a href="..">back</a>
</body>
</html>