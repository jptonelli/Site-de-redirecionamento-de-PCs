<?php
// Conecta-se ao banco de dados
include 'db_connect.php';

// Prepara a consulta SQL para buscar produtos
$sql = "SELECT * FROM produtos";

// Executa a consulta SQL
$result = $conn->query($sql);

// Exibe as imagens
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<img src='data:image/png;base64," . base64_encode($row['imagem']) . "' alt='Imagem do Produto'>";
    echo "</div>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>