<header>
    <div class="container-header">
        <div class="left">
            <a href="../">
                <img src="../assets/broker-logo.png" alt="logo" width="130px">
            </a>
        </div>
        <div class="right">
            <nav>
                <ul class="menu">
                    <li class="item-menu"><a href="/">Início</a></li>
                    <li class="item-menu"><a href="/clientes">Clientes</a></li>
                    <li class="menu-user"><a>Olá, <?= $_SESSION['user_first_name'] ?><img src="/assets/user-svg-icon.svg" width="25px" /> </a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>