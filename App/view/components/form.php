<div class="container">
    <h1>Cadastrar Cliente</h1>
    <form method="post" action="/create">
            <input type="hidden" name="id" value="<?= $customer->getId() ?? "" ?>">
        <fieldset class="customer-data-forms">
            <legend>Dados pessoais</legend>
            <input type="text" placeholder="Nome do cliente" value="<?= $customer->getFirstName() ?? ""  ?>" name="name" id="name">
            <input type="date" placeholder="Data de Nascimento" value="<?= $customer->getBirthDate() ?? "" ?>" name="birth_date" id="birth_date">
        </fieldset>
        <fieldset class="address-form">
            <legend>Endereço</legend>
            <?php if ($customer->getAddress() != null): ?>
                <div class="group-form">
                    <input type="text" placeholder="Digite o CEP" value="<?= $customer->getAddress()->getCep() ?? "" ?>" name="cep" id="cep">
                    <input type="text" placeholder="Digite a rua" value="<?= $customer->getAddress()->getStreet() ?? "" ?>" name="street" id="street">
                    <input type="text" placeholder="Digite o número" value="<?= $customer->getAddress()->getNumber() ?? "" ?>" name="number" id="number">
                </div>
                <div class="group-form">
                    <input type="text" placeholder="Digite o bairro" value="<?= $customer->getAddress()->getNeighborhood() ?? "" ?>" name="neighborhood" id="neighborhood">
                    <input type="text" placeholder="Digite a cidade" value="<?= $customer->getAddress()->getCity() ?? "" ?>" name="city" id="city">
                    <input type="text" placeholder="Digite o estado" value="<?= $customer->getAddress()->getState() ?? "" ?>" name="state" id="state">
                </div>
            <?php else: ?>
                <div class="group-form">
                    <input type="text" placeholder="Digite o CEP" value="" name="cep" id="cep">
                    <input type="text" placeholder="Digite a rua" value="" name="street" id="street">
                    <input type="text" placeholder="Digite o número" value="" name="number" id="number">
                </div>
                <div class="group-form">
                    <input type="text" placeholder="Digite o bairro" value="" name="neighborhood" id="neighborhood">
                    <input type="text" placeholder="Digite a cidade" value="" name="city" id="city">
                    <input type="text" placeholder="Digite o estado" value="" name="state" id="state">
                </div>
            <?php endif ?>
        </fieldset>
        <fieldset class="contact-form">
            <legend>Contato</legend>
            <input type="email" placeholder="Digite o seu melhor e-mail" value="<?= $customer->getEmail() ?? "" ?>" name="email" id="email">
            <input type="text" placeholder="Digite o seu número de celular" value="<?= $customer->getCellphone() ?? "" ?>" name="cellphone" id="cellphone">
        </fieldset>

        <input type="submit" class="btn-submit" value="Cadastrar" style="margin-top: 20px;">
    </form>
</div>