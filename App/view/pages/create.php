<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Cadastrar Clientes</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include VIEW . "components/header.php"; ?>
    <main class="fade-in-animation" id="main">
        <div class="container-fluid">
            <?php include VIEW . "components/form.php"; ?>
        </div>
    </main>
    <?php include VIEW . "components/footer.php"; ?>
    <script src="../scripts/main.js"></script>
    <script src="../scripts/form.js" defer></script>
    <script src="../scripts/cep-api.js" defer></script>
</body>
</html>