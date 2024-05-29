<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/login.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"> </script>
    <script src="/Site-de-redirecionamento-de-PCs/js/letters.js" defer></script>
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
              <button class="btn button2">
                <a href="login.php">Acessar/Cadastrar</a>
            </li>
            </button>
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
        <div class="login">
            <h4 class="title" id="letter"></h4>
            <h6>Informe seus dados para se conectar</h6>
            <form action="" method="POST" class="form">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Digite seu usuário">
                <br>
    
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha">
    
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
      <a target="_blank"
        href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&theme=mn&ddm=0">contato@email.com</a><br>
      <a target="_blank" href="https://web.whatsapp.com/">(14)99999-9999</a>

      <!-- LIBERAR QUANDO O USUÁRIO FOR ADMIN -->
      <a target="_blank" class="whatsapp-button" href="https://wa.me/5514991334662?text=Adorei%20seu%20artigo">
        <i style="margin-top:16px" class="fa fa-whatsapp"></i>
      </a>
      <p>Todos os Direitos Reservados &#9400</p>
    </div>
  </div>
</body>
</html>