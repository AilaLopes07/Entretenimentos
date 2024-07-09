<?php 
require_once __DIR__ . "/../auxiliares/auxiliar.php";


if(isset($_FILES['imagem']) && !empty($_FILES["imagem"])) {

//var_dump($_FILES);

move_uploaded_file ($_FILES["imagem"]["tmp_name"], "../img/".$_FILES["imagem"] ["name"]);
echo "uploado realizado com sucesso";
$imagem = "../img/". $_FILES["imagem"]["name"];

move_uploaded_file ($_FILES["imagem"]["tmp_name"],$imagem);

//var_dump($imagem);
  }
//  else{
//     $imagem = "";
// }


// $SQLIMAGEM = "INSERT INTO listagem_entretenimentos (imagem) VALUES ('$imagem') WHERE id = 1";
// $result = mysqli_query($conn, $SQLIMAGEM);

$query = "SELECT * FROM listagem_entretenimentos";

$select = mysqli_query($conn, $query);

$table = mysqli_fetch_all($select, MYSQLI_ASSOC);


// $query = "SELECT le.id, le.nome, le.imagem, te.nome as tipo, le.faixa_etaria, le.diretor, le.sinopse, le.duracao, le.lancamento, ce.nome as categoria
// FROM listagem_entretenimentos as le
// INNER JOIN tipos_entretenimento as te on le.id_tipo = te.id
// INNER JOIN listagem_entretenimentos_connect_categorias as lec on le.id = lec.id_listagem_entretenimentos
// LEFT JOIN categorias_entretenimento as ce on ce.id = lec.id_categorias WHERE le.nome ";

// $select = mysqli_query($conn, $query);
// $table = mysqli_fetch_assoc($select);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
table{
    border-collapse: collapse;
    width: 100%;
}
td{
    border: 1px solid black;
    padding: 5px;
}

thead{
    text-align: center;
    background-color: #b0db8c;
}
tbody tr:hover{
    background-color: #f7f7f7;
}
.acoes{
    text-align: center;
}
.apagar{
    color: red;
}
.icon{
    width: 20px;
}


</style>
</head>
<body>


<form method="post"  enctype="multipart/form-data" action="">
    <p><label for=""> selecione o arquivo</label>
    <input type= "file" name = "imagem" accept = "image/*"></p>
    <button type="submit"> enviar arquivo </button>
</form>

<table>
        <thead>
            <td>ID</td>
            <td>Nome</td>
            <td>faixa_etaria</td>
            <td>duracao</td>
            <td>diretor</td>
            <td>lancamento</td>
            <td>sinopse</td>
            
        </thead>
        <tbody>
            <?php
            foreach ($table as $tabela => $value) {
                
                echo '<tr>'.
                    '<td>'.$value['id'].'</td>'.
                    '<td>' .$value['nome'].'</td>'.
                    '<td>' .$value['faixa_etaria'].'</td>'.
                    '<td>' .$value['duracao'].'</td>'.
                    '<td>' .$value['diretor'].'</td>'.
                    '<td>' .$value['lancamento'].'</td>'.
                    '<td>' .$value['sinopse'].'</td>'.

                    


                    '<td class="acoes"><a href="editar.php?id='.$value['id'].'">editar</a>  <a class="apagar" href="apagar.php?id='.$value['id'].'">apagar</a></td>'.
                    '</tr>';
            }
            
            ?>

</body>
</html>
