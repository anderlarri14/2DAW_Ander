<?php
function bExec($query){
  try{
    $pdo = new PDO("mysql:host=localhost;dbname=oferta_fp", "ikaslea", "ikaslea");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    $pdo->exec($query);
  } catch(PDOException $error){
     echo "Problem with dabase, Error info: <br> " . $error;
     exit();
  }
};
function bQuery($query){
  try{
    $pdo = new PDO("mysql:host=localhost;dbname=oferta_fp", "ikaslea", "ikaslea");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    $result = $pdo->query($query);
    return $result;
  } catch(PDOException $error){
     echo "Problem with dabase, Error info: <br> " . $error;
     exit();
  }
}
 ?>