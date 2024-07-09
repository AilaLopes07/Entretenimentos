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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post"  enctype="multipart/form-data" action="">
    <p><label for=""> selecione o arquivo</label>
    <input type= "file" name = "imagem" accept = "image/*"></p>
    <button type="submit"> enviar arquivo </button>
</form>

</body>
</html>