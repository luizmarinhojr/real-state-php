<?php if (!empty($customers)): ?>
<div class="container-fluid">
    <div class="container">
        <h2 style="margin: 0;">Últimos clientes adicionados</h2>
        <div class="table-container">
            <table>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?> <img src="/assets/plus-icon.svg" width="12px" /></td>
                            <td><?= $customer->getCellphone() ?> <img src="/assets/plus-icon.svg" width="12px" /></td>
                            <td><?= $customer->getAddress()->getNeighborhood() ?> <img src="/assets/plus-icon.svg" width="12px" /></td>
                            <td><?= $customer->getAddress()->getCity() ?> <img src="/assets/plus-icon.svg" width="12px" /></td>
                        </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif ?>