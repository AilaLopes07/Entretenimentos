<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $login = $_POST['login'];
    $idnivel = $_POST['id_nivel'];

    $sql = "INSERT INTO usuarios (nome, email, senha, `login`, id_nivel) VALUES ('$username', '$email', '$password', '$login', '$idnivel')";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php");
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
    }
}

// Informações dos niveis

$sql = "SELECT id, nome FROM niveis_usuario WHERE `status` = 'ativo'";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .cadastro {
            width: 310px;
            margin: 0% auto;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-size: 20px;
        }

        .cadastro .tt{
            width: 300px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Cadastre-se</h1>
    <form method="post" class="cadastro">
        <input class="tt" type="text" name="username" placeholder="Nome de usuário" required><br>
        <input class="tt" type="email" name="email" placeholder="Email" required><br>
        <input class="tt" type="password" name="password" placeholder="Senha" required><br>
        <input style="margin-bottom: 20px" class="tt" type="text" name="login" placeholder="login" required><br>
        <!-- <input type="text" name="id_nivel" placeholder="1 a 5" required><br> -->
        <label for="nivel">Qual seu nivel administrativo:</label><br>
        <select id="nivel" name="id_nivel"><br>
            <?php
            foreach ($result as $value) {
            ?>
                <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" value="CADASTRAR">
        <p>Já tem uma conta? <a class="botao" href="login.php">Entre</a></p>
        <p>Faça sua pesquisa. <a class="botao" href="../index.php">Tela inicial.</a></p>

    </form>
</body>

</html>