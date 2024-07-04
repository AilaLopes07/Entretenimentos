<?php
include 'auxiliar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $_POST['login'];
    $idnivel = $_POST['id_nivel'];

    $query = "INSERT INTO usuarios (nome, email, senha, `login`, id_nivel) VALUES ('$username', '$email', '$password', '$login', '$idnivel')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.html");
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
    }
}
?>
