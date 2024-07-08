<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";
require_once __DIR__ . "/../auxiliares/restrito.php";

if (empty($_GET['id'])) {
    header("Location: admin.php");
} else{
    $id = $_GET['id'];
}

$query = "SELECT nome,email,`login` FROM usuarios WHERE id = $id";
$dados = mysqli_query($conn, $query);
$af = mysqli_fetch_assoc($dados);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) or $_POST['username'] == $af['nome']) {
        
    } else{
        $name = $_POST['username'];
        
        $updname = "UPDATE usuarios
                    SET nome = '$name'
                    WHERE id = $id";
        $aname = mysqli_query($conn, $updname);
    }
    if (empty($_POST['email']) or $_POST['email'] == $af['email']) {
        
    } else {
        $email = $_POST['email'];
        $updemail = "UPDATE usuarios
                     SET email = '$email'
                     WHERE id = $id";
        $aemail = mysqli_query($conn, $updemail);
        
    }
    if (empty($_POST['login']) or $_POST['login'] == $af['login']) {
        
    } else {
        $login = $_POST['login'];
        $updlogin = "UPDATE usuarios
                     SET `login` = '$login'
                     WHERE id = $id";
        $alogin = mysqli_query($conn, $updlogin);
        
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="username" placeholder="Nome de usuário" value="<?= $af['nome'] ?>" required><br>
    <input type="email" name="email" placeholder="Email" value="<?= $af['email'] ?>" required><br>
    <input type="text" name="login" placeholder="login" value="<?= $af['login'] ?>" required><br>
    <input type="submit" value="Editar">
    </form>
    
</body>
</html>