<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio04</title>
</head>
<body>
    <?php
    
    $arr_Largos= ["Enero", "Marzo", "Mayo", "Julio", "Agosto", "Octubre", "Diciembre"];
    
    $arr_Todos= [
        "Enero"=> 0,
        "Febrero"=> 0,
        "Marzo"=> 0,
        "Abril"=> 0,
        "Mayo"=> 0,
        "Junio"=> 0,
        "Julio"=> 0,
        "Agosto" => 0,
        "Septiembre" => 0,
        "Octubre" => 0,
        "Noviembre" => 0,
        "Diciembre" => 0
    ];
    
    foreach ($arr_Todos as $aux => $valor) {
        if (in_array($aux, $arr_Largos)) {
            $arr_Todos[$aux] = 31;
        }elseif (!in_array($aux,$arr_Largos)){
            $arr_Todos[$aux] = 30;
        }
        $arr_Todos["Febrero"] = 28;
        echo "El mes $aux tiene $arr_Todos[$aux] dias <br>";
    }
    ?>
</body>
</html>