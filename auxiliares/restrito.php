<?php
if (empty($_SESSION['id_user'])) {
    header("Location: cadastro.php");
} else if ($_SESSION['nivel'] < 2) {
    header("Location: admin.php");
} // else if ($_SESSION['nivel'] < 2) {

// } 