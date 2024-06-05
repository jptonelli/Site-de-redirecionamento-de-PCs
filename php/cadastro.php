<?php
session_start();
include 'db_connect.php';

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
        // Verifica se o usuário já existe
        $sql = "SELECT id_usu FROM usuarios WHERE usuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error_message = "Usuário já existe. Por favor, escolha outro.";
        } else {
            // Hash da senha
            $senha_hashed = password_hash($senha, PASSWORD_BCRYPT);

            // Inserir no banco de dados
            $sql = "INSERT INTO usuarios (nome, CPF, usuario, senha, email, data_de_nascimento) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nome, $cpf, $usuario, $senha_hashed, $email, $nascimento);

            if ($stmt->execute()) {
                // Guarda os dados na sessão
                $_SESSION['loggedin'] = true;
                $_SESSION['id_usu'] = $stmt->insert_id;
                $_SESSION['nome'] = $nome;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['email'] = $email;

                // Redireciona para a página de minhaConta
                header("Location: minhaConta.php");
                exit;
            } else {
                $error_message = "Erro ao criar a conta: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/barraPesquisa.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/login.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cadastro.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"> </script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <title>Cadastro</title>
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
    <div class="main">
        <div class="cadastrar">        
            <form action="cadastro.php" method="POST" class="form">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                <br>

                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF" value="<?php echo isset($_POST['cpf']) ? htmlspecialchars($_POST['cpf']) : ''; ?>" required>
                <br>

                <label for="user" class="form-label">Usuário</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Crie um usuário" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>" required>
                
                <br>

                <label for="password" class="form-label">Senha</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha" required>
                <br>

                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu e-mail" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                <br>

                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo isset($_POST['nascimento']) ? htmlspecialchars($_POST['nascimento']) : ''; ?>" required>
<br>
<?php
                if (!empty($error_message) && strpos($error_message, 'Usuário já existe') !== false) {
                    echo '<p style="color: red;">' . htmlspecialchars($error_message) . '</p>';
                }
                ?>

<input type="submit" value="CRIAR CONTA" class="btn btn-success button" />
</form>
</div>
</div>
</body>
</html>
