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
                    <li id="menu-user" class="menu-user item-menu">
                        <a class="hello-user">Olá, <?= $_SESSION['user_first_name'] ?><img src="/assets/user-svg-icon.svg" width="25px" /> </a>
                        <div class="menu-popup">
                            <ul class="menu-items">
                                <li class="item-menu"><a href="/">Meu perfil</a></li>
                                <li class="item-menu"><a href="/logout">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>