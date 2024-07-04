<?php
require_once __DIR__ . "/auxiliares/auxiliar.php";

// $_SESSION ;
// $usuario_sql = "SELECT nome FROM usuarios WHERE id = 2";
// $usuario_query =mysqli_fetch_assoc(mysqli_query($conn, $usuario_sql));
var_dump($_SESSION);

if (empty($_SESSION)){
    header("location: login.php");
}

$nivel_user = $_SESSION['nivel'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topheader">
        <h1 class="tlt">Entretenimentos</h1>
        <strong>Bem vindo, <?php
        // Verifica se possui uma session, caso n possua exibe o nome como convidado
        if (!empty($_SESSION)){
            echo $_SESSION['username'];
        } else {
            echo "convidado";
        }
        ?></strong>
        <a href="sair.php">Sair</a>
        </header>
    
    <main>
    <form action="pesquisa.php" method="get">
        <div style="margin: auto; width: 50%; text-align: center; margin-top: 10px;">
            <label for="pesquisa">Pesquisa</label>
            <br>
            <input style="width: 60%; height: 30px; border-radius: 10px; border: 1px solid green;" type="text" id="pesquisa" name="pesquisa">
        </div>
    </form>
</main>
</body>
</html>
