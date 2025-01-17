<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";

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

        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td{
            border: 1px solid black;
            padding: 5px;
        }
        
        thead{
            text-align: center;
            background-color: #b0db8c;
        }
        tbody tr:hover{
            background-color: #f7f7f7;
        }
        .acoes{
            text-align: center;
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
    <h1>Lista de usuarios</h1>
    <a href="cadastro.php"><img class="icon" src="../assets/mais_icon.png" alt="Ícone de mais"></a>

    <table>
        <thead>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Login</td>
            <td>Nível</td>
            <td>Ações</td>
            
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
                    '<td class="acoes"><a href="editar.php?id='.$value['id'].'">editar</a>  <a class="apagar" href="apagar.php?id='.$value['id'].'">apagar</a></td>'.
                    '</tr>';
            }
            
            ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
    
</body>
</html>
