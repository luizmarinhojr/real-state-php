<div class="container">
    <h1>Clientes</h1>
    <div class="actions">
        <a href="./clientes/cadastrar" class="btn-actions new">+ Novo Cliente</a>
        <a href="./clientes" class="btn-actions delete">Excluir Cliente</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Nasc.</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($customers)): ?>
                <tr>
                    <td colspan="8">Ainda não há clientes cadastrados</td>
                </tr>
            
            <?php else: ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= $customer->getFirstName() ?></td>
                        <td><?= $customer->getLastName() ?></td>
                        <td><?= $customer->getAddress()->getNeighborhood() ?></td>
                        <td><?= $customer->getAddress()->getCity() ?></td>
                        <td><?= $customer->getCellphone() ?></td>
                        <td><?= $customer->getEmail() ?></td>
                        <td><?= $customer->getBirthDate() ?></td>
                        <td><a class="btn-table info" href="<?= 'clientes/cadastrar?id=' . $customer->getId() ?>">Detalhar</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
