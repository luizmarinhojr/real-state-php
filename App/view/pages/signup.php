<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Cadastro</title>
    <link rel="stylesheet" href="styles/variables.css">
    <link rel="stylesheet" href="styles/signin.css">
    <link rel="stylesheet" href="styles/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <main class="fade-in-animation" id="main">
        <div class="background-blur-overlay height100"></div>

        <div class="container-fluid-login">
            <div class="text-intro" style="display: flex; flex-direction: column; align-items: center;">
                <img src="../assets/broker-logo.png" alt="Logo BrokMint" width="150px">
                <p>Cadastre-se agora</p>
            </div>
            <form action="/cadastrar" method="POST">
                <div class="form-container">
                    <label for="first_name">Nome:</label>
                    <input type="text" placeholder="Digite seu nome" name="first_name" id="first_name">
                </div>

                <div class="form-container">
                    <label for="last_name">Sobrenome:</label>
                    <input type="text" placeholder="Digite seu sobrenome" name="last_name" id="last_name">
                </div>

                <div class="form-container">
                    <label for="email">E-mail:</label>
                    <input type="email" placeholder="Digite seu e-mail" name="email" id="email">
                </div>
                
                <div class="form-container">
                    <label for="password">Senha:</label>
                    <input type="password" placeholder="Digite sua senha" name="password" id="password">
                </div>
                <div class="form-container">
                    <label for="password">Confirme sua senha</label>
                    <input type="password" placeholder="Digite sua senha novamente" name="password-confirm" id="password-confirm" onkeyup="checkPasswords()">
                </div>
                <input type="submit" value="Cadastrar" id="signup-button" disabled>
            </form>
        </div>
    </main>

    <script src="../scripts/main.js"></script>
    <script src="../scripts/signup.js"></script>
</body>

</html>