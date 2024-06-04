<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

// Verifica se o usuário está logado, caso contrário redireciona para a página de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['user'];
    $senha = $_POST['password'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];

    // Validação básica
    if (empty($nome) || empty($cpf) || empty($usuario) || empty($senha) || empty($email) || empty($nascimento)) {
        $error_message = "Todos os campos são obrigatórios.";
    } else {
        // Atualiza no banco de dados
        $sql = "UPDATE usuarios SET nome=?, CPF=?, usuario=?, senha=?, email=?, data_de_nascimento=? WHERE id_usu=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $nome, $cpf, $usuario, $senha, $email, $nascimento, $_SESSION['id_usu']);

        if ($stmt->execute()) {
            // Atualiza os dados na sessão
            $_SESSION['nome'] = $nome;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['email'] = $email;
            $success_message = "Dados atualizados com sucesso!";
        } else {
            $error_message = "Erro ao atualizar os dados: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Carrega os dados do usuário do banco de dados
$sql = "SELECT nome, CPF, usuario, senha, email, data_de_nascimento FROM usuarios WHERE id_usu=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['id_usu']);
$stmt->execute();
$stmt->store_result(); // Armazena o resultado para poder verificar o número de linhas
$stmt->bind_result($nome, $cpf, $usuario, $senha, $email, $nascimento);
$stmt->fetch(); // Captura o resultado
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/login.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cadastro.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/letters.js" defer></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <title>Minha Conta</title>
</head>
<body>
    <?php include 'cabecalho.php'; ?>

    <div class="main">
        <div class="cadastrar">        
            <form action="minhaConta.php" method="POST" class="form">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                <br>

                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($cpf); ?>" required>
                <br>

                <label for="user" class="form-label">Usuário</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Crie um usuário" value="<?php echo htmlspecialchars($usuario); ?>" required>
                <br>

                <label for="password" class="form-label">Senha</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha" value="<?php echo htmlspecialchars($senha); ?>" required>
                <br>

                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu e-mail" value="<?php echo htmlspecialchars($email); ?>" required>
                <br>

                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo htmlspecialchars($nascimento); ?>" required>
                <br>

                <?php
                if (!empty($error_message)) {
                    echo '<p style="color: red;">' . htmlspecialchars($error_message) . '</p>';
                }
                if (!empty($success_message)) {
                    echo '<p style="color: green;">' . htmlspecialchars($success_message) . '</p>';
                }
                ?>

                <input type="submit" value="ATUALIZAR DADOS" class="btn btn-success button" />
            </form>
        </div>
    </div>
</body>
</html>
