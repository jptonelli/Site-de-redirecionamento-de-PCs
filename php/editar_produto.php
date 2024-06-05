<?php
include 'db_connect.php';

$error_message = "";
$success_message = "";

if (isset($_GET['id_prod'])) {
    $id = $_GET['id_prod'];
    $sql = "SELECT * FROM produtos WHERE id_prod = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $produto = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $link = $_POST['link'];
        $imagem = $_FILES['imagem'];

        // Verificar se o arquivo é uma imagem
        if ($imagem['name']) {
            $check = getimagesize($imagem["tmp_name"]);
            if ($check !== false) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($imagem["name"]);
                move_uploaded_file($imagem["tmp_name"], $target_file);
            } else {
                $error_message = "O arquivo não é uma imagem válida.";
            }
        } else {
            $target_file = $produto['imagem'];
        }

        $sql = "UPDATE produtos SET nome_prod = ?, descricao = ?, preco = ?, imagem = ?, link_produto = ? WHERE id_prod = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi",$nome, $descricao, $preco, $target_file, $link, $id);
        if ($stmt->execute()) {
            $success_message = "Produto atualizado com sucesso!";
            header("Location: editaProduto.php");
            exit();
        } else {
            $error_message = "Erro ao atualizar o produto: " . $stmt->error;
        }
    }
} else {
    header("Location: editaProduto.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Editar Produto</h2>
    <?php
    if ($error_message) {
        echo "<div class='alert alert-danger'>$error_message</div>";
    }
    if ($success_message) {
        echo "<div class='alert alert-success'>$success_message</div>";
    }
    ?>
    <form action="editar_produto.php?id_prod=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome_prod']); ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo htmlspecialchars($produto['descricao']); ?>" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="<?php echo htmlspecialchars($produto['link_produto']); ?>" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem do Produto</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
            <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Produto" style="width: 100px; height: auto;">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>