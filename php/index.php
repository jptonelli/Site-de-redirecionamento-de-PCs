<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/style.css">
  <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/barraPesquisa.css">
  <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
  <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
  <script src="/Site-de-redirecionamento-de-PCs/js/script.js" defer></script>
  <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"> </script>
  <title>PC</title>
</head>

<body>
  <div id="cabecalho">
    <div class="logo" style="margin-left: 45px;">
      <p style="color: #6F86FF;">Chip <span style="color: #fff;">Chase</span></p>
    </div>
    <div class="off-screen-menu">
      <a href="minhaConta.php">
        <img class="user-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVVcFthDAQnOmE64SrJKGBwBfyuLtHji+kgaOT0EmoJBstMidjjI1QeMQS4mGxM7O7MxAHHx5cH5sAiloSETwApAAGfUjcmpJ9jGAUoPiQV+FY3D2DEN1nyVsIJAhQ1JKK4EsLCHHVYqrmB3ih4GqUZCElQYC8lgcEqmAsbjO1lPVtxfOaijDAXb4BJCROTUnt/fOYuej90FY8/TmAFszvIvpuK64SjSnQ/qe+Fr3VchnnQHRtyWyXArsN08Y4QwaJ8+4hK6snUw9FCrLmnd3uNZ0+PNRoMafG7oNDNu3ReNBn4WRdUSH6kJu9AMbBGg9JjKG512zyOnoBYMdDKAp0LkpABJdJoW+jFgC5cW9sv+0FsLPJdfUMYGu+uG2zt8w15QxgCrct++0BmZJ3Fn5zgEC4xYa9Fn4uQDS8QkC+8Iv+0WLMY/f/H+AXOg3LGaNmGQsAAAAASUVORK5CYII="/>
      </a>

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
  
  <div class="main" id="home">
    <div class="box-busca">
      <div class="search-box">
        <form method="GET" action="buscaProduto.php">
          <input type="text" class="search-box-input" name="busca" placeholder="Faça sua Pesquisa">
          <button class="search-box-button"><!--<i class="search-box-icone icon icon-search"></i>--> <img
              src="/Site-de-redirecionamento-de-PCs/img/lupa.png" alt=""></button>
        </form>
      </div>
    </div>

    <div class="promocional">
      <img src="/Site-de-redirecionamento-de-PCs/img/promo.jpg" alt="promoção" class="promocao">
    </div>

    <div class="container">
      <div id="mCarousel" class="carrossel carousel slide" data-ride="carousel">

        <!-- Indicadores -->
        <ol class="carousel-indicators">
          <li data-target="#mCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#mCarousel" data-slide-to="1"></li>
          <li data-target="#mCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper-->
        <div class="carousel-inner">
          <div class="item active">
            <a href="produto.php" target="_blank">
              <img class="img" src="/Site-de-redirecionamento-de-PCs/img/note-1.png" alt="trybe_photo" style="width: 50%;">
            </a>
          </div>

          <div class="item">
            <img class="img" src="/Site-de-redirecionamento-de-PCs/img/note-2.png" alt="trybe_1" style="width: 50%;">
          </div>

          <div class="item">
            <img class="img" src="/Site-de-redirecionamento-de-PCs/img/note-3.png" alt="Trybe_logo" style="width: 50%;">
          </div>
        </div>


        <!--Controles de direita e esquerda -->
        <a class="left carousel-control" href="#mCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#mCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
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