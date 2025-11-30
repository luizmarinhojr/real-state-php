<header>
    <div class="container-header">
        <div class="left">
            <a href="../">
                <img class="logo" src="../assets/broker-logo.png" alt="logo" width="130px">
            </a>
        </div>
        <div class="right">
            <nav>
                <ul class="menu-desktop">
                    <li class="item-menu-desktop"><a href="/">Início</a></li>
                    <li class="item-menu-desktop"><a href="/clientes">Clientes</a></li>
                    <li id="menu-desktop-user" class="menu-desktop-user item-menu-desktop">
                        <a class="hello-user">Olá, <?= $_SESSION['user_first_name'] ?><img src="/assets/user-svg-icon.svg" width="25px" /> </a>
                        <div class="menu-desktop-popup">
                            <ul class="menu-desktop-items">
                                <li class="item-menu-desktop"><a href="/">Meu perfil</a></li>
                                <li class="item-menu-desktop"><a href="/logout">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="menu-mobile">
                    <img id="menu-mobile-icon" class="" src="/assets/menu-icon.svg" alt="" width="50px">
                    <div id="sidebar-mobile" class="sidebar-mobile">
                        <div class="sidebar-header">
                            <a class="hello-user-mobile"><img src="/assets/user-svg-icon.svg" width="25px" /> Olá, <?= $_SESSION['user_first_name'] ?> </a>
                        </div>
                        <div class="sidebar-main">
                            <ul class="menu-mobile-ul">
                                <div class="menu-mobile-pages">
                                    <li class="item-menu-mobile"><a href="/">Início</a></li>
                                    <li class="item-menu-mobile"><a href="/clientes">Clientes</a></li>
                                </div>
                        
                                <div class="menu-mobile-actions">
                                    <li class="item-menu-mobile"><a href="/">Meu perfil</a></li>
                                    <li class="item-menu-mobile"><a href="/logout">Sair</a></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>