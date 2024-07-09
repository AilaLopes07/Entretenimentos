<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";
require_once __DIR__ . "/../auxiliares/restrito.php";

// if (empty($_SESSION['id_user'])) {
//     header("Location: cadastro.php");
// } else if ($_SESSION['nivel'] < 2) {
//     header("Location: admin.php");
// }

$query = "SELECT * FROM usuarios";

$select = mysqli_query($conn, $query);

$table = mysqli_fetch_all($select, MYSQLI_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
        table{
            border-collapse: collapse;
        }
        td{
            border: 1px solid black;
            padding: 5px;
        }
        .apagar{
            color: red;
        }
        .icon{
            width: 20px;
        }


    </style>
</head>
<body>
    <p><?= $_SESSION['nivel'] ?></p>
    <a href=""><img class="icon" src="../assets/mais_icon.png" alt="Ícone de mais"></a>

    <table>
        <thead>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Login</td>
            <td>Nível</td>
            
        </thead>
        <tbody>
            <?php
            foreach ($table as $tabela => $value) {
                
                echo '<tr>'.
                    '<td>'.$value['id'].'</td>'.
                    '<td>' .$value['nome'].'</td>'.
                    '<td>' .$value['email'].'</td>'.
                    '<td>' .$value['login'].'</td>'.
                    '<td>' .$value['id_nivel'].'</td>'.
                    '<td><a href="editar.php?id='.$value['id'].'">editar</a></td>'.
                    '<td><a class="apagar" href="apagar.php?id='.$value['id'].'">apagar</a></td>'.
                    '</tr>';
            }
            
            ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
    
</body>
</html>