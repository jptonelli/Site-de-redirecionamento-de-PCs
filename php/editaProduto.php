<?php
include 'db_connect.php';

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_FILES['imagem'];
    $link = $_POST['link'];

    // Validação básica
    if (empty($descricao) || empty($preco) || empty($imagem['name'])) {
        $error_message = "Todos os campos são obrigatórios.";
    } else {
        // Verificar se o arquivo é uma imagem
        $check = getimagesize($imagem["tmp_name"]);
        if($check !== false) {
            // Diretório onde a imagem será armazenada 
            $target_dir = "uploads/";
            // Nome do arquivo
            $target_file = $target_dir . basename($imagem["name"]);
            // Mover o arquivo para o diretório de destino
            if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
                // Inserir no banco de dados
                $sql = "INSERT INTO produtos (nome_prod, descricao, preco, imagem, link_produto) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                // Vincular os parâmetros
                $stmt->bind_param("ssdss", $nome, $descricao, $preco, $target_file, $link);
                if ($stmt->execute()) {
                    $success_message = "Produto adicionado com sucesso!";
                } else {
                    $error_message = "Erro ao adicionar o produto: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $error_message = "Erro ao fazer upload do arquivo.";
            }
        } else {
            $error_message = "O arquivo não é uma imagem válida.";
        }
    }
}

// Lógica para buscar produtos do banco de dados
$buscar = "";
$sql = "SELECT * FROM produtos";
$params = [];
$types = "";

if (isset($_GET["localizar"]) && !empty($_GET["localizar"])) {
    $buscar = $_GET["localizar"];
    $sql .= " WHERE descricao LIKE ? OR nome_prod LIKE ?";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
    $types .= "ss";
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$rs = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/editaProduto.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/footer.css">
    <script src="/Site-de-redirecionamento-de-PCs/js/script.js" defer></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #cadastroProduto {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="cabecalho">
        <div class="logo" style="margin-left: 45px;">
            <p style="color: #6F86FF;">Chip <span style="color: #fff;">Chase</span></p>
        </div>
        <div class="off-screen-menu">
            <a href="minhaConta.php">
                <img class="user-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVVcFthDAQnOmE64SrJKGBwBfyuLtHji+kgaOT0EmoJBstMidjjI1QeMQS4mGxM7O7MxAHHx5cH5sAiloSETwApAAGfUjcmpJ9jGAUoPiQV+FY3D2DEN1nyVsIJAhQ1JKK4EsLCHHVYqrmB3ih4GqUZCElQYC8lgcEqmAsbjO1lPVtxfOaijDAXb4BJCROTUnt/fOYuej90FY8/TmAFszvIvpuK64SjSnQ/qe+Fr3VchnnQHRtyWyXArsN08Y4QwaJ8+4hK6snUw9FCrLmnd3uNZ0+PNRoMafG7oNDNu3ReNBn4WRdUSH6kJu9AMbBGg9JjKG512zyOnoBYMdDKAp0LkpABJdJoW+jFgC5cW9sv+0FsLPJdfUMYGu+uG2zt8w15QxgCrct++0BmZJ3Fn5zgEC4xYa9Fn4uQDS8QkC+8Iv+0WLMY/f/H+AXOg3LGaNmGQsAAAAASUVORK5CYII="/>
            </a>
            <ul>
                <li><a href="index.php" style="font-size: 1.5rem; text-decoration:none">Home</a></li>
                <li><a href="#contato" style="font-size: 1.5rem; text-decoration:none">Contato</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <form method="GET" action="">
                        <input type="text" class="form-control" name="localizar" placeholder="Procure Aqui" value="<?php echo htmlspecialchars($buscar); ?>" />
                        <input style="margin-top: 10px" type="submit" class="input-group-text" value="BUSCAR"/>
                    </form>
                </div>
                <button id="adicionarBtn" class="btn btn-success">+ Adicionar</button>
            </div>
            <div id="cadastroProduto" class="col-12">
                <h2 style="color:#fff; margin-top: 15px">Cadastrar Novo Produto</h2>
                <form action="editaProduto.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label" style="color:#fff">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label" style="color:#fff">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo isset($_POST['descricao']) ? htmlspecialchars($_POST['descricao']) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label" style="color:#fff">Preço</label>
                        <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo isset($_POST['preco']) ? htmlspecialchars($_POST['preco']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label" style="color:#fff">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="<?php echo isset($_POST['link']) ? htmlspecialchars($_POST['link']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagem" class="form-label" style="color:#fff">Imagem do Produto</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*"
                        required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
            <div class="col-12">
                <h2 style="color:#fff; margin-top: 15px">Produtos Cadastrados</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="color:#fff">Imagem</th>
                            <th style="color:#fff">Nome</th>
                            <th style="color:#fff">Descrição</th>
                            <th style="color:#fff">Preço</th>
                            <th style="color:#fff">Link</th>
                            <th style="color:#fff">Editar</th>
                            <th style="color:#fff">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Exibir produtos na tabela
                        while ($linha = $rs->fetch_assoc()) {
                            echo "<tr>
                                    <td><img src='" . htmlspecialchars($linha["imagem"]) . "' alt='Produto' style='width: 100px; height: auto;'></td>
                                    <td style='color:#fff'>" . htmlspecialchars($linha["nome_prod"]) . "</td>
                                    <td style='color:#fff'>" . htmlspecialchars($linha["descricao"]) . "</td>
                                    <td style='color:#fff'>R$ " . number_format($linha["preco"], 2, ',', '.') . "</td>
                                    <td style='color:#fff'><a href='" . htmlspecialchars($linha["link_produto"]) . "' target='_blank'>Link</a></td>
                                    <td><a href='editar_produto.php?id_prod=" . $linha["id_prod"] . "' class='text-decoration-none'>✏️</a></td>
                                    <td><a href='excluir_produto.php?id_prod=" . $linha["id_prod"] . "' class='btn btn-danger'>🗑️</a></td>
                                  </tr>";
                        }
                        $stmt->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="patrocinadores">
            <h4>Accenture</h4>
            <h4>Positivo</h4>
            <h4>Dell</h4>
            <h4>Claro</h4>
            <h4>Telnet</h4>
        </div>
        <hr>
        <div class="contato" id="contato">
            <a target="_blank" href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&theme=mn&ddm=0">contato@email.com</a><br>
            <a target="_blank" href="https://web.whatsapp.com/">(14)99999-9999</a>
            <a target="_blank" class="whatsapp-button" href="https://wa.me/5514991334662?text=Adorei%20seu%20artigo">
                <i style="margin-top:16px" class="fa fa-whatsapp"></i>
            </a>
            <p>Todos os Direitos Reservados &#9400</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.getElementById('adicionarBtn').addEventListener('click', function() {
            var cadastroProduto = document.getElementById('cadastroProduto');
            if (cadastroProduto.style.display === 'none' || cadastroProduto.style.display === '') {
                cadastroProduto.style.display = 'block';
            } else {
                cadastroProduto.style.display = 'none';
            }
        });
    </script>
</body>
</html>