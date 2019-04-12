<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
</head>
<body>
    <h1><?php echo $centroName;?></h1>
    <br>
    <br>
    <table>
        <tr>
            <th colspan="2">Cycle Name</th>
            <th colspan="2">Family</th>
        </tr>
        <?php
            foreach ($miguel as $aux) {
                echo "<tr>";
                echo "<td><a href=\"../../../\">". $aux['cicloEu'] ."</a></td>";
                echo "<td><a href=\"../../../\">". $aux['cicloEs'] ."</a></td>";
                echo "<td>". $aux['familiEu'] ."</td>";
                echo "<td>". $aux['familiEs'] ."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>