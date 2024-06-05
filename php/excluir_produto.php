<?php
include 'db_connect.php';

if (isset($_GET['id_prod'])) {
    $id = $_GET['id_prod'];

    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM produtos WHERE id_prod = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da query: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: editaProduto.php");
        exit();
    } else {
        echo "Erro ao excluir o produto: " . $stmt->error;
    }
} else {
    echo "ID do produto não fornecido.";
    header("Location: editaProduto.php");
    exit();
}
?>