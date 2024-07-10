<?php
require_once __DIR__ . "/../auxiliares/auxiliar.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else{
    header("Location: admin.php");
}

$sql = "SELECT us.nome, us.email, us.`login`, us.id_nivel, nu.nome as nivel FROM usuarios as us INNER JOIN niveis_usuario as nu on us.id_nivel = nu.id WHERE us.id = $id";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os valores estão vazios e verificar se são o mesmo de antes
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['login']) && $_POST['username'] != $dados['nome'] || $_POST['email'] != $dados['email'] || $_POST['login'] != $dados['login'] || $_POST['id_nivel'] != $dados['id_nivel']) {
        // throw new Exception('Erro na edição');
        // Renomeando
        $name = $_POST['username'];
        $updname = "UPDATE usuarios SET nome = '$name' WHERE id = $id";

        
        // Mudando o email
        $email = $_POST['email'];
        $updemail = "UPDATE usuarios SET email = '$email' WHERE id = $id";
        
        // Mudando o login
        $login = $_POST['login'];
        $updlogin = "UPDATE usuarios SET `login` = '$login' WHERE id = $id";
        
        // Mudando o nivel
        $nivel = $_POST['id_nivel'];
        $updnivel = "UPDATE usuarios SET id_nivel = '$nivel' WHERE id = 20";

        // Tratamento de erro e execução 
        try{
            $rename = mysqli_query($conn, $updname);
            $renivel = mysqli_query($conn, $updnivel);
            $relogin = mysqli_query($conn, $updlogin);
            $reemail = mysqli_query($conn, $updemail);
        }
        catch (Exception $e) {
            echo $e ->getMessage();
        }

        if ($rename && $renivel && $relogin && $reemail) {
            header("Refresh: 0");
        }
        
    } else {
        header("location: editar.php?id=$id");
    }
        

}

// Níveis

$sql = "SELECT id, nome FROM niveis_usuario WHERE `status` = 'ativo'";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        
    </style>
</head>
<body>
    <form method="POST">
    <input type="text" name="username" placeholder="Nome de usuário" value="<?= $dados['nome'] ?>" required><br>
    <input type="email" name="email" placeholder="Email" value="<?= $dados['email'] ?>" required><br>
    <input type="text" name="login" placeholder="login" value="<?= $dados['login'] ?>" required><br>
    <label for="nivel">Nivel atual: <?= $dados['nivel'] ?></label>
    <select id="nivel" name="id_nivel"><br>
    <?php
            foreach($result as $value){
                ?>
                <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                <?php
            }   
            ?>
            </select>
            <br>
            <input type="submit" value="Editar">
    </form>
    <a href="admin.php">Voltar</a>
    
</body>
</html>
