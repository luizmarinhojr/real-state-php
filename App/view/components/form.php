<div class="container">
    <h1>Cadastrar Cliente</h1>
    <form method="post" action="<?= $customer->getId() == '' ? "/clientes/cadastrar" : '/clientes/atualizar' ?>" id="form-register">
            <input type="hidden" name="id" value="<?= $customer->getId() ?? "" ?>">
        <fieldset class="customer-data-forms">
            <legend>Dados pessoais</legend>
            <input type="text" placeholder="Nome do cliente" value="<?= $customer->getFirstName() ?? ""  ?>" name="first_name" id="first_name">
            <input type="text" placeholder="Sobrenome do cliente" value="<?= $customer->getLastName() ?? ""  ?>" name="last_name" id="last_name">
            <input type="text" placeholder="CPF do cliente" value="<?= $customer->getCpf() ?? ""  ?>" name="cpf" id="cpf">
            <input type="date" placeholder="Data de Nascimento" value="<?= $customer->getBirthDate() ?? "" ?>" name="birth_date" id="birth_date">
        </fieldset>
        <fieldset class="contact-form">
            <legend>Contato</legend>
            <input type="email" placeholder="Digite o seu melhor e-mail" value="<?= $customer->getEmail() ?? "" ?>" name="email" id="email">
            <input type="text" placeholder="Digite o seu número de celular" value="<?= $customer->getCellphone() ?? "" ?>" name="cellphone" id="cellphone">
        </fieldset>
        <label for="address">Cadastrar endereço?</label>

        <?php if ($customer->getAddress() != null): ?>
            <input type="hidden" name="id-address" value="<?= $customer->getAddress()->getId()?>">
            <input type="checkbox" name="address" id="address" onchange="toogleAddressGroup()" checked>
        <?php else: ?>
            <input type="checkbox" name="address" id="address" onchange="toogleAddressGroup()">
        <?php endif ?>

        <div id="address-group" class="hide">
            <fieldset class="address-form">
                <legend>Endereço</legend>

                <?php if ($customer->getAddress() != null): ?>
                    <div class="group-form">
                        <input type="text" placeholder="Digite o CEP" oninput="fillAddressByCep(this)" value="<?= $customer->getAddress()->getCep() ?? "" ?>" name="cep" id="cep">
                        <input type="text" placeholder="Digite a rua" value="<?= $customer->getAddress()->getStreet() ?? "" ?>" name="street" id="street">
                        <input type="text" placeholder="Digite o número" value="<?= $customer->getAddress()->getNumber() ?? "" ?>" name="number" id="number">
                        <input type="text" placeholder="Digite o complemento" value="<?= $customer->getAddress()->getComplement() ?? "" ?>" name="complement" id="complement">
                    </div>
                    <div class="group-form">
                        <input type="text" placeholder="Digite o bairro" value="<?= $customer->getAddress()->getNeighborhood() ?? "" ?>" name="neighborhood" id="neighborhood">
                        <input type="text" placeholder="Digite a cidade" value="<?= $customer->getAddress()->getCity() ?? "" ?>" name="city" id="city">
                        <input type="text" placeholder="Digite o estado" value="<?= $customer->getAddress()->getState() ?? "" ?>" name="state" id="state">
                    </div>
                <?php else: ?>
                    <div class="group-form">
                        <input type="text" placeholder="Digite o CEP" oninput="fillAddressByCep(this)" value="" name="cep" id="cep">
                        <input type="text" placeholder="Digite a rua" value="" name="street" id="street">
                        <input type="text" placeholder="Digite o número" value="" name="number" id="number">
                        <input type="text" placeholder="Digite o complemento" value="" name="complement" id="complement">
                    </div>
                    <div class="group-form">
                        <input type="text" placeholder="Digite o bairro" value="" name="neighborhood" id="neighborhood">
                        <input type="text" placeholder="Digite a cidade" value="" name="city" id="city">
                        <input type="text" placeholder="Digite o estado" value="" name="state" id="state">
                    </div>
                <?php endif ?>
                
            </fieldset>
        </div>

        <input type="submit" class="btn-submit" value="<?= $customer->getId() == '' ? 'Cadastrar' : 'Atualizar' ?>" style="margin-top: 20px;">
    </form>
</div>