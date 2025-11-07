<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Clientes Cadastrados</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/variables.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container-header">
            <div class="left">
                <a href="../">
                    <img src="./assets/broker-logo.png" alt="logo" width="130px">
                </a>
            </div>
            <div class="right">
                <nav>
                    <ul class="menu">
                        <li><a>Início</a></li>
                        <li><a>Clientes</a></li>
                        <li><a>Info</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Clientes</h1>

            <div class="actions">
                <a href="./customer" class="btn-actions new">+ Novo Cliente</a>
                <a href="./customer" class="btn-actions delete">Excluir Cliente</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>CEP</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Nasc.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include "../controller/CustomerController.php"?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>
