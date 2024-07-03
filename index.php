<?php
require_once __DIR__ . "/auxiliar.php";

$sql = "SELECT le.nome, le.faixa_etaria, le.diretor, le.duracao, le.sinopse, ce.nome as categoria FROM listagem_entretenimentos as le INNER JOIN listagem_entretenimentos_connect_categorias as lec on le.id = lec.id_listagem_entretenimentos LEFT JOIN categorias_entretenimento as ce on ce.id = lec.id_categorias LIKE '%estrelas%' ;";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($query);

print_r($result);

/// $result['informações'] --- nome, faixa_etaria, diretor, duracao, sinopse, categoria;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme - <?= $result['nome'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 class="tlt">Entretenimentos</h1>
    </header>

    <section class="container">
        <header>
            <h1><?= $result['nome'] ?></h1>
            <span>
                <?= $result['faixa_etaria'] ?? " -- " ?> |
                <?= $result['duracao'] ?? " --:-- " ?> |
                <?= $result['tipo'] ?? " -- " ?> |
                <?= $result['categoria'] ?? " -- " ?> |
            </span>
        </header>

        <nav>
            <ul>
                <h3>Siga as nossas redes sociais</h3>
                <li>Instagram</li>
                <li>Twitter</li>
                <li>Facebook</li>

            </ul>
        </nav>

        <main>
            <h2>Sobre o(a) tipo</h2>

            <div>
                <strong>Nome:</strong>
            </div>

            <div>
                <strong>Faixa Etária:</strong>
            </div>

            <div>
                <strong>Duração:</strong>
            </div>

            <div>
                <strong>Diretor:</strong>
            </div>

            <div>
                <strong>Lançamento:</strong>
            </div>

            <div>
                <strong>Categorias:</strong>
            </div>
        </main>

        <div class="propraganda">
            <p>ESPAÇO PARA A PROPAGANDA</p>
        </div>

        <main>
            <h2>Sinopse</h2>
            <p>sinopse</p>
        </main>

        <main>
            <h2>Recentes</h2>

            <section class="recentes">
                <header>
                    <div>
                        <span>Filme</span>
                    </div>
                </header>
                <hr>
                <main>
                    <div>
                        <li>Diretor:</li>
                        <li>Duração:</li>
                        <li>Classificação: </li>
                    </div>
                </main>
                <footer>
                    <span>Link</span>
                </footer>
            </section>
        </main>
        <a href="#">Topo</a>
    </section>

    <footer class="u">
        <section>
            <nav>
                <ul>
                    <h3>Siga as nossas redes sociais</h3>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Facebook</li>
                </ul>
            </nav>
        </section>
    </footer>
</body>
</html>