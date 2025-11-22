<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Login</title>
    <link rel="stylesheet" href="styles/variables.css">
    <link rel="stylesheet" href="styles/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include VIEW . "components/flash_message.php" ?>
    <main class="fade-in-animation" id="main">
        <div class="background-blur-overlay height100"></div>

        <div class="container-fluid-login">
            <div class="text-intro" style="display: flex; flex-direction: column; align-items: center;">
                <img src="../assets/broker-logo.png" alt="Logo BrokMint" width="150px">
                <p>Faça login para acessar o dashboard</p>
            </div>
            <form action="/login" method="POST">
                <div class="form-container">
                    <label for="email">E-mail: <span style="color: red;">*</span></label>
                    <input type="email" placeholder="Digite seu e-mail" name="email" id="email" required>
                </div>
                
                <div class="form-container">
                    <label for="password">Senha: <span style="color: red;">*</span></label>
                    <input type="password" placeholder="Digite sua senha" name="password" id="password" required>
                </div>
                <input type="submit" value="Entrar">
            </form>
            <div class="signup">
                <p class="create-account">Não tem uma conta? <a href="cadastrar">Cadastre-se aqui</a></p>
            </div>
        </div>
    </main>

    <script src="../scripts/main.js"></script>
</body>

</html>