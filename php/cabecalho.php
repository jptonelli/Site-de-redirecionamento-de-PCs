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
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#contato">Contato</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <li><a href="minhaConta.php">Minha Conta</a></li>
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
