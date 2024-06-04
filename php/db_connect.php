<?php
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "root";
$password = "";
$dbname = "site";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>