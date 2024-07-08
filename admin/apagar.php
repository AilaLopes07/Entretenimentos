<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";
require_once __DIR__ . "/../auxiliares/restrito.php";
$id = $_GET['id'];
$apagar = "DELETE FROM usuarios WHERE id = $id";
$delete = mysqli_query($conn, $apagar);
if ($delete) {
    header("Location: usuarios.php");
}