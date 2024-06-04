<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

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
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <li><a href="logout.php">Sair</a></li>
            <?php else: ?>
            <li>
                <button class="btn button">
                    <a href="login.php">Acessar/Cadastrar</a>
                </button>
            </li>
            <?php endif; ?>
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
