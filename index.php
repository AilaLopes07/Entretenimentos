<?php
require_once __DIR__ . "/auxiliares/auxiliar.php";

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
        <div class="div-admin-img">
        <a href="admin/admin.php"><img class="admin-img" src="assets/admin-icon.png" alt=""></a>
        </div>
        <h1 class="tlt">Entretenimentos</h1>
    </header>
    
    <main>
        <form action="pesquisa.php" method="get">
            <div style="margin: auto; width: 50%; text-align: center; margin-top: 10px;">
                <!-- verificar se a pesquisa é vazia -->
                <label for="pesquisa">Pesquisa</label>
                <br>
                <input style="width: 60%; height: 30px; border-radius: 10px; border: 1px solid green;" type="text" id="pesquisa" name="pesquisa">
            </div>
</main>
</body>
</html>
