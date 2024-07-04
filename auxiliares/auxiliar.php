<?php
session_start();
const DB_host = "localhost";
const DB_username = "root";
const DB_password = "";
const DB_database = "entretenimentos";

    $conn = mysqli_connect(DB_host, DB_username, DB_password, DB_database);

// Verificar se o usuário é administrador
$admin = false;

?>