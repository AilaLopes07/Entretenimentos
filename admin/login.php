<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];


    $sql = "SELECT id, nome, `login`, senha, id_nivel FROM usuarios WHERE `login`='$login' AND `status`='ativo'";
    $query = mysqli_query($conn, $sql);


    if (mysqli_num_rows($query) == 1) {
        $result = mysqli_fetch_assoc($query);
        if (password_verify($password, $result['senha'])){
            $_SESSION['id_user'] = $result['id'];
            $_SESSION['login'] = $login;
            $_SESSION['username'] = $result['nome'];
            // armazenando o nivel do usuário
            $_SESSION['nivel'] = $result['id_nivel'];
            header("Location: admin.php");
            exit;
        } else{
            echo "Login ou senha inválidos.";
        }
    } else {
        echo "Login ou senha inválidos.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
    <div class="login-container">
        <div>
            <h2>Entre</h2>
            <form method="POST">
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="password" placeholder="Senha" required>
                <input type="submit" value="ENTRE">
                <p>Novo aqui? <a href="cadastro.php">Cadastre-se</a></p>
                <p>Faça sua pesquisa. <a href="../index.php">Tela inicial.</a></p>

            </form>
        </div>
    </div>
</body>
</html>
