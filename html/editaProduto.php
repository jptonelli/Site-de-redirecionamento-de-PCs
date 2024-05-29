<?php
    //Banco V
    //Buscar todos os usuarios
    //Adicionar eles na TABLE
    /*
    if(isset($_GET["localizar"])){
        $buscar = $_GET['localizar'];

        $con = new mysqli("127.0.0.1", "root", "", "aula07");
        
        $sql = "SELECT * FROM login where usuario LIKE '%$buscar%'";
        $rs = $con->query($sql);
    } else {
        $con = new mysqli("127.0.0.1",
        "root",
        "",
        "aula07");

        $sql = "SELECT * FROM login";
        $rs = $con->query($sql);
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/cabecalho.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/menu-ham.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/editaProduto.css">
    <link rel="stylesheet" href="/Site-de-redirecionamento-de-PCs/css/footer.css">
    <script src="/Site-de-redirecionamento-de-PCs/js/script.js" defer></script>
    <script src="/Site-de-redirecionamento-de-PCs/js/menu-ham.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <li><a href="index.php" style="font-size: 1.5rem; text-decoration:none">Home</a></li>
            <li><a href="#contato" style="font-size: 1.5rem; text-decoration:none"">Contato</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <form method="GET" action="">
                        <input type="text" class="form-control"
                                name="localizar" 
                                placeholder="Procure Aqui"
                            />
                        <input style="margin-top: 10px" type="submit" class="input-group-text" 
                                value="BUSCAR" href="#"/>
                    </form>
                </div>
                <a href="login_cadastro.php" class="btn btn-success">+ Adicionar</a>
            </div>
            <div class="col-12">
                <h2 style="color:#fff; margin-top: 15px">Produtos Cadastrados</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style="color:#fff">Imagem</td>
                            <td style="color:#fff">Computador</td>
                            <td style="color:#fff">Descrição</td>
                            <td style="color:#fff">Preço</td>
                            <td style="color:#fff">Editar</td>
                            <td style="color:#fff">Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*
                            while($linha = $rs->fetch_assoc()) {
                                echo "  <tr>
                                            <td>" . $linha["id"] . "</td>
                                            <td>" . $linha["usuario"] . "</td>
                                            <td>
                                                <a href='login_alterar.php?id=" . $linha["id"] . "' style='text-decoration:none'>✏️</a>
                                                <a href='login_excluir.php?id=" . $linha["id"] . "' class='btn btn-danger'>🗑️</a>
                                            </td>
                                        </tr>";
                            }
                        */
                        ?>
                    </tbody>
                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>