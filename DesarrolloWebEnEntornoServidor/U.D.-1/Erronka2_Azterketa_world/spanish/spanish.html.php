<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spanish</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
</head>
<body>
    <h1>Countries where spanish is official</h1>
    <a href="..">back</a> <br>
    <?php
        echo "<table class=\"table\">";
        echo "<tr>
                <th>Country</th>
                <th>Continent</th>
                <th>Population</th>
              </tr>";
        foreach ($spanish as $aux) {
             echo "<tr><td>". $aux['name']."</td>";
                    echo "<td>". $aux['Continent'] ."</td>";
                    echo "<td>". $aux['Population'] ."</td>
                    </tr>";

        }
        echo "</table>";
    ?>
</body>
</html>