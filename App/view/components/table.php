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
                        <td  class="table-actions" colspan="2">
                            <a class="action-icon" href="<?= 'clientes/cadastrar?id=' . $customer->getId() ?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> 
                                        <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#3737FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                    </g>
                                </svg>
                            </a>
                            <a class="action-icon" href="<?= 'clientes/excluir?id=' . $customer->getId() ?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> 
                                        <path d="M10 11V17" stroke="#e01b24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                        <path d="M14 11V17" stroke="#e01b24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                        <path d="M4 7H20" stroke="#e01b24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#e01b24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#e01b24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
