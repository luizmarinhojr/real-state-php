<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrokMint - Clientes Cadastrados</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/variables.css">
    <link rel="stylesheet" href="styles/table.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include VIEW . "components/header.php"; ?>
    <?php include VIEW . "components/flash_message.php" ?>
    <main class="fade-in-animation" id="main">
        <div class="container-fluid">
            <?php include VIEW . "components/table.php"; ?>
        </div>
    </main>
    <?php include VIEW . "components/footer.php"; ?>
    <script src="../scripts/main.js"></script>
</body>
</html>