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
    <?php include 'cabecalho.php'; ?>
        <nav>
            <div class="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>

    <main class="main teste">
    <div class="box-busca">
      <div class="search-box">
        <form method="GET" action="buscaProduto.php" class="search-box">
          <input type="text" class="search-box-input" name="busca" placeholder="Faça sua Pesquisa">
          <button type="submit" class="search-box-button">
            <img src="/Site-de-redirecionamento-de-PCs/img/lupa.png" alt="">
          </button>
        </form>
      </div>
    </div>
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
                        echo "<img src='" . $imagem_src . "' class='card-img-top' alt='Produto' style='width: 800px; height: 400px;'>";
                        echo "<div class='card-body'>";
                        echo "<div class='clearfix mb-3'>";
                        echo "<span class='float-start badge rounded-pill bg-primary'>" . $row['tipo'] . "</span>";
                        echo "</div>";
                        echo "<h3 class='card-title'>" . $row['nome_prod'] . "</h3>";
                        echo "<p class='card-text'>" . $row['descricao'] . "</p>";
                        echo "<div class='text-center my-4'>";
                        echo "<span class='float-end price-hp'>" . $row['preco'] . "&real;</span><br>";
                        echo "<a href='" . $row['link_produto'] . "' class='btn btn-warning' target='_blank'>Ver oferta</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    // Mostra mensagem em branco
                    echo "<p style='color: white;'>Nenhum produto encontrado.</p>";
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
