<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/barraPesquisa.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/buscaProduto.css">
    <script src="/Site-de-redirecionamento-de-PCs/js/script.js" defer></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"> </script>
    <title>Produtos</title>
</head>

<body>
    <div id="cabecalho">
        <div class="logo" style="margin-left: 45px;">
            <p style="color: #6F86FF;">Chip <span style="color: #fff;">Chase</span></p>
        </div>
        <div class="off-screen-menu">
            <a href="editaProduto.php">
                <img class="user-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQlJREFUSEvVlb0RgzAMRj9tkmwCm4QJoIUUCQ20kAXIJmEUNlFOd5gTBIzNTxE6OPs960O2CSc/dDIfhwnikhsGuldKuV70SJCUHDCjAXCxVUaEsEqpNWMEDsZN3pnw1JKRIC74AyDwgSclX5gh84ZFaclUwAKvM3KKTuBVSt1UQoyoutNbWJsFfSxBH9cgIUZu4JsFOnMAnZHMRetdwQRumF2d0XW3YAEOnflU4lyBK1xaXbewk8AHLi2ru3BV4AqXaOKCf9p8XdBPGm1/1ef6+yEC2w/dLbDBN0fkc5xvquDvBKvHtUNFbZ1RaMbNXTiPtTvBIpGDL1rcyQ6r8x7idLF4U9WE0wVfheXhGWIwFvcAAAAASUVORK5CYII="/>
              </a>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#contato">Contato</a></li>
                <li>
                    <button class="btn button">
                        <a href="login.php">Acessar/Cadastrar</a>
                    </button>
                </li>
            </ul>
        </div>

        <nav>
            <div class="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>

    <main class="main teste">
        <div class="container bg-trasparent my-4 p-3 cartao" style="position: relative;">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                <?php
                // Conecta-se ao banco de dados
                include 'db_connect.php';

                // Prepara a consulta SQL para buscar produtos
                $sql = "SELECT * FROM produtos";

                // Verifica se foi enviado um termo de pesquisa
                if (isset($_GET['busca']) && !empty($_GET['busca'])) {
                    // Prepara o termo de pesquisa
                    $termo_pesquisa = '%' . $_GET['busca'] . '%';

                    // Modifica a consulta SQL para filtrar por termo de pesquisa
                    $sql = "SELECT * FROM produtos WHERE nome_prod LIKE ? OR descricao LIKE ?";
                }

                // Prepara e executa a consulta SQL
                $stmt = $conn->prepare($sql);

                // Se houver termo de pesquisa, faz o bind dos parâmetros
                if (isset($termo_pesquisa)) {
                    $stmt->bind_param("ss", $termo_pesquisa, $termo_pesquisa);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                // Verifica se há resultados
                if ($result->num_rows > 0) {
                    // Exibe os resultados
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col'>";
                        echo "<div class='card h-100 shadow-sm'>";
                        // Referencia o caminho da imagem
                        $imagem_src = $row['imagem'];
                        echo "<img src='" . $imagem_src . "' class='card-img-top' alt='Produto'>";
                        echo "<div class='card-body'>";
                        echo "<div class='clearfix mb-3'>";
                        echo "<span class='float-start badge rounded-pill bg-primary'>" . $row['tipo'] . "</span>";
                        echo "<span class='float-end price-hp'>" . $row['preco'] . "&euro;</span>";
                        echo "</div>";
                        echo "<h5 class='card-title'>" . $row['nome_prod'] . "</h5>";
                        echo "<p class='card-text'>" . $row['descricao'] . "</p>";
                        echo "<div class='text-center my-4'>";
                        echo "<a href='" . $row['link_produto'] . "' class='btn btn-warning'>Ver oferta</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }

                // Fecha a conexão com o banco de dados
                $stmt->close();
                $conn->close();
                ?>
            </div>
        </div>
    </main>
</body>

</html>
