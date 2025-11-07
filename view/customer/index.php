<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="./customer.css">
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/form.css">
</head>
<body>
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
            <h1>Cadastrar Cliente</h1>
            <form action="">
                <fieldset class="customer-data-forms">
                    <legend>Dados pessoais</legend>
                    <input type="text" placeholder="Nome do cliente">
                    <input type="date" placeholder="Data de Nascimento">
                </fieldset>
                <fieldset class="address-form">
                    <legend>Endereço</legend>
                    <input type="text" placeholder="Digite a rua">
                    <input type="text" placeholder="Digite o número">
                    <input type="text" placeholder="Digite o CEP">
                </fieldset>
                <fieldset class="contact-form">
                    <legend>Contato</legend>
                    <input type="email" placeholder="Digite o seu melhor e-mail">
                    <input type="text" placeholder="Digite o seu número de celular">
                </fieldset>

                <input type="submit" class="btn-submit" value="Cadastrar" style="margin-top: 20px;">
            </form>
        </div>
    </main>
</body>
</html>