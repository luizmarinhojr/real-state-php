<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Seu CRM favorito</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/variables.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include VIEW . "components/header.php"; ?>
    <main class="fade-in-animation" id="main">
        <div class="container-fluid">
            <div class="container">
                <h1>Bem-vindo a <span style="color: var(--primary-color);">BROKER</span></h1>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="container">
                <div class="cards">
                    <div class="card">
                        <h2 class="no-margin">Listar Clientes</h2>
                        <p>Buscar e listar clientes</p>
                        <a class="btn-actions info" href="clientes">Acessar</a>
                    </div>
                    <div class="card">
                        <h2 class="no-margin">Cadastrar Clientes</h2>
                        <p>Cadastrar novos clientes</p>
                        <a class="btn-actions info" href="clientes/cadastrar">Acessar</a>
                    </div>
                    <div class="card">
                        <h2 class="no-margin">Listar Clientes</h2>
                        <p>Buscar e listar clientes</p>
                        <a class="btn-actions info" href="">Acessar</a>
                    </div>
                    <div class="card">
                        <h2 class="no-margin">Listar Clientes</h2>
                        <p>Buscar e listar clientes</p>
                        <a class="btn-actions info" href="">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include VIEW . "components/footer.php"; ?>
    <script src="../scripts/main.js"></script>
</body>
</html>