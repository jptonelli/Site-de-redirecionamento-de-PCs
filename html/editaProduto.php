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
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <form method="GET" action="">
                        <input type="text" class="form-control"
                                name="localizar" 
                                placeholder="Digite até 3 letras para procurar"
                            />
                        <input style="margin-top: 10px" type="submit" class="input-group-text" 
                                value="BUSCAR" href="pessoas_buscar.php"/>
                    </form>
                </div>
                <a href="login_cadastro.php" class="btn btn-success">NOVO</a>
            </div>
            <div class="col-12">
                <h2 style="color:#fff; margin-top: 15px">Listagem de usuários</h2>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>