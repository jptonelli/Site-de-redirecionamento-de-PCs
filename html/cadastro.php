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
    <title>Login</title>
</head>
<body>
    <div id="cabecalho">
        <div class="logo" style="margin-left: 45px;">
          <p style="color: #6F86FF;">Chip <span style="color: #fff;">Chase</span></p>
        </div>
        <div class="off-screen-menu">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#contato">Contato</a></li>
            <li>
              <button class="btn button">
                <a href="login.php">Acessar/Cadastrar</a>
              </button>
            </li>
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
    <div class="main">
        <div class="cadastrar">        
            <form action="" method="POST" class="form">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" id="name" class="form-control" placeholder="Digite seu nome">
                <br>

                <label for="CPF" class="form-label">CPF</label>
                <input type="text" id="cpf" class="form-control" placeholder="Digite seu CPF">
                <br>

                <label for="user" class="form-label">Usuário</label>
                <input type="text" id="user" class="form-control" placeholder="Crie um usuário">
                <br>

                <label for="password" class="form-label">Senha</label>
                <input type="password" id="password" class="form-control" placeholder="Digite seu senha">
                <br>

                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="Digite seu e-mail">
                <br>

                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" id="nascimento" class="form-control" placeholder="dd/mm/aaaa">
                <br>

                <input type="submit" value="CRIAR CONTA" class="btn btn-success button" />
            </form>
        </div>
            
    </div>
</body>
</html>