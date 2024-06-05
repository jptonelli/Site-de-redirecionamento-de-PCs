<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: editaProduto.php");
        exit();
    } else {
        echo "Erro ao excluir o produto: " . $stmt->error;
    }
} else {
    header("Location: editaProduto.php");
    exit();
}
?>
