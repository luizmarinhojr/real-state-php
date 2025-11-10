<div class="container">
    <h1>Clientes</h1>
    <div class="actions">
        <a href="./create" class="btn-actions new">+ Novo Cliente</a>
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
                        <td><?= $customer->getName() ?></td>
                        <td><?= $customer->getAddress()->getStreet() ?></td>
                        <td><?= $customer->getAddress()->getNumber() ?></td>
                        <td><?= $customer->getAddress()->getCep() ?></td>
                        <td><?= $customer->getCellphone() ?></td>
                        <td><?= $customer->getEmail() ?></td>
                        <td><?= $customer->getBirthDate() ?></td>
                        <td><a class="btn-table info" href="<?= '/create?id=' . $customer->getId() ?>">Detalhar</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
