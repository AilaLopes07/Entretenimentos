<?php
require_once __DIR__ . "/auxiliar.php";

$sql = "SELECT le.nome, te.nome as tipo, le.faixa_etaria, le.diretor, le.sinopse, le.duracao, ce.nome as categoria
FROM listagem_entretenimentos as le
INNER JOIN tipos_entretenimento as te on le.id_tipo = te.id
INNER JOIN listagem_entretenimentos_connect_categorias as lec on le.id = lec.id_listagem_entretenimentos
LEFT JOIN categorias_entretenimento as ce on ce.id = lec.id_categorias WHERE le.nome LIKE '%estrela%'";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($query);

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
print_r($result);

$nome_filme = $result['nome'];


$id_tpmain = $result['tipo'];

/// $result['informações'] --- nome, faixa_etaria, diretor, duracao, sinopse, categoria;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tipo_main ?> - <?= $result['nome'] ?></title>
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
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ul>
        </nav>

        <main>
            <h2>Sobre o(a) tipo</h2>

            <div>
                <strong>Nome: <?= $result['nome'] ?></strong>
            </div>

            <div>
                <strong>Faixa Etária: <?= $result['faixa_etaria']?></strong>
            </div>

            <div>
                <strong>Duração: <?= $result['duracao']?></strong>
            </div>

            <div>
                <strong>Diretor: <?= $result['diretor'] ?></strong>
            </div>

            <div>
                <strong>Lançamento: </strong> <!-- Não tem informação, eu acho -->
            </div>

            <div>
                <strong>Categorias: <?= $result['categoria']?></strong> <!-- Não tem também , vai ter que mudar no banco de dados depois -->
            </div>
        </main>

        <div class="propaganda">
            <p>ESPAÇO PARA A PROPAGANDA</p>
        </div>

        <main>
            <h2>Sinopse</h2>
            <p><?= $result['sinopse'] ?></p>
        </main>

        <main>
            <h2>Recentes</h2>
            <div class="grid">


            <?php
            $query_recentes = "SELECT * FROM listagem_entretenimentos WHERE nome <> '$nome_filme' limit 6;";

            $recentes = mysqli_query($conn, $query_recentes);

            $recentes_result = mysqli_fetch_all($recentes, MYSQLI_ASSOC);

            // var_dump($recentes_result);



            foreach ($recentes_result as $rec => $value) {
                $r_nome = $value['nome'];
                $r_diretor  = $value['diretor'];
                $r_dur = $value['duracao'];
                $r_class = $value['faixa_etaria'];
                $id_tp = $value['id_tipo'];


                $tipo_query = "  SELECT
                    `listagem_entretenimentos`.id_tipo, `tipos_entretenimento`.nome
                    FROM `listagem_entretenimentos`
                    INNER JOIN `tipos_entretenimento`
                    ON `listagem_entretenimentos`.id_tipo = `tipos_entretenimento`.id
                    WHERE `listagem_entretenimentos`.id = $id_tp";

                    $tipo_pesquisa = mysqli_query($conn, $tipo_query);

                    $resultado_pesquisa = mysqli_fetch_assoc($tipo_pesquisa);



        

            
            ?>

            <section class="recentes">
                <header>
                    <div>
                        <span><?= $r_nome ?></span>
                    </div>
                </header>
                <hr>
                <main>
                    <div>
                        <li>Diretor: <?= $r_diretor ?></li>
                        <li>Duração: <?= $r_dur ?></li>
                        <li>Classificação: <?= $r_class ?></li>
                    </div>
                </main>
                <footer>
                    <a href="#"><span>Link <?= $resultado_pesquisa['nome'] ?></span></a>
                </footer>
            </section>

            <?php
            }
            ?>



        </main>
        </div>
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