<?php
session_start();
include 'auxiliar.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM usuarios WHERE `login`='$username' AND senha='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Nome de usuário ou senha inválidos.";
    }
}
?>
