<div class="container">
    <h1>Clientes</h1>
    <div class="actions">
        <a href="./create/" class="btn-actions new">+ Novo Cliente</a>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['nome'] ?></td>
                    <td><?= $customer['rua'] ?></td>
                    <td><?= $customer['numero'] ?></td>
                    <td><?= $customer['cep'] ?></td>
                    <td><?= $customer['celular'] ?></td>
                    <td><?= $customer['email'] ?></td>
                    <td><?= $customer['nasc'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
