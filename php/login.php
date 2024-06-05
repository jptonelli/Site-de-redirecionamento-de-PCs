<?php
session_start();
include 'db_connect.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    if (empty($user) || empty($senha)) {
        $error_message = "Usuário ou senha não podem estar vazios.";
    } else {
        // Seleciona o usuário com base no nome de usuário
        $sql = "SELECT id_usu, senha, hierarquia FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifica se a senha fornecida corresponde ao hash no banco de dados
            if (password_verify($senha, $row['senha'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['id_usu'] = $row['id_usu']; // Adiciona o ID do usuário à sessão
                $_SESSION['hierarquia'] = $row['hierarquia']; // Adiciona a hierarquia à sessão
                header("Location: minhaConta.php");
                exit();
            } else {
                $error_message = "Usuário ou senha inválidos.";
            }
        } else {
            $error_message = "Usuário ou senha inválidos.";
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/login.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/letters.js" defer></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <title>Login</title>
</head>
<body>
  <?php include 'cabecalho.php'; ?>

    <div class="main">
        <div class="login">
            <h4 class="title" id="letter"></h4>
            <h6>Informe seus dados para se conectar</h6>
            <form action="login.php" method="POST" class="form">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Digite seu usuário" value="<?php echo isset($user) ? htmlspecialchars($user) : ''; ?>">
                <br>
    
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha">
                <?php
                if (!empty($error_message)) {
                    echo '<p style="color: red;">' . htmlspecialchars($error_message) . '</p>';
                }
                ?>
                <input type="submit" value="ACESSAR CONTA" class="btn btn-primary button"/>
            </form>
        </div>

        <div class="cadastro">
            <h4 class="title" id="letter2"></h4>
            <h6>Crie sua conta clicando no botão abaixo</h6>

            <form action="cadastro.php" method="GET" class="form">
                <input type="submit" value="CRIE SUA CONTA" class="btn btn-success button" />
            </form>
        </div>
    </div>
</body>
</html>
