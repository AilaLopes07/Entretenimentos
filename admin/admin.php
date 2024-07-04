<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";

if (empty($_SESSION)){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrativo</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        nav{
            position: relative;
            right: 0px; top: 0px;
            background-color: #a3c585;
            width: 17vw; height: 100vh; 

        }
        img nav{
            /* position: absolute; */
            /* display: inline-block; */
            /* top: 10px; */
            /* left: 10px; */
            width: 100px;
        }
        ul{
            position: relative;
            top: 50px;
        }
        li{
            margin-bottom: 40px;
            margin-left: 10px;
        }

        a{
            color: black;
            text-decoration: none;
            transition: 0.3s;
        }
        
        a:hover{
            color: blue;
            text-decoration: underline;
        }
        h1,h2{
            display: inline;
        }
        h1{
            position: absolute;
            top: 20px;
            left: 300px;
        }
        h2{
            position: absolute;
            top: 55px;
            left: 300px;
        }
        main{
            display: flex;
        }
        .sair{
            position: absolute;
            bottom: 20px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <main>
        <nav>
            <img style="width: 70px; margin-left: 10px; margin-top: 10px;" src="../img/config_certo.png" alt="configurações">
            <ul>
                <a href="#"><li>Perfil</li></a>
                <a href="#"><li>Níveis de usuário</li></a>
                <a href="#"><li>Usuários</li></a>
                <a href="#"><li>Tipos</li></a>
                <a href="#"><li>Categorias</li></a>
                <a href="#"><li>Entretenimentos</li></a>
                <a href="../index.php"><li>Voltar</li></a>
            </ul>
            <div class="sair">
                <a href="../auxiliares/sair.php">Sair</a>
            </div>
        </nav>
        <h1>Configurações</h1>
        <h2>Bem vindo <?= $_SESSION['username'] ?></h2>
    </main>
</body>
</html>