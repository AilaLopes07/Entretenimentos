<?php
require_once __DIR__ . "/auxiliar.php";

$sql = "SELECT le.nome, le.faixa_etaria, le.diretor, le.duracao, le.sinopse, ce.nome as categoria FROM listagem_entretenimentos as le INNER JOIN listagem_entretenimentos_connect_categorias as lec on le.id = lec.id_listagem_entretenimentos LEFT JOIN categorias_entretenimento as ce on ce.id = lec.id_categorias LIKE '%estrelas%' ;";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($query);

print_r($result);

/// $result['informações'] --- nome, faixa_etaria, diretor, duracao, sinopse, categoria;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme - <?=$result['nome']?></title>
</head>
<body>
    
</body>
</html>