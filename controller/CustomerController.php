<?php 
    $clientes = [
        [
            'nome' => 'Maicon',
            'rua' => 'Rua C',
            'numero' => 23,
            'cep' => '24913-412',
            'celular' => '(21) 99999-3213',
            'email' => 'maiconwasalski@gmail.com',
            'nasc' => '20/05/1991',
        ],
        [
            'nome' => 'Fernanda',
            'rua' => 'Rua das Rosas',
            'numero' => 52,
            'cep' => '24911-024',
            'celular' => '(21) 99233-3213',
            'email' => 'fernandinhagatinha@gmail.com',
            'nasc' => '11/12/1994',
        ],
    ];

    // O controller gera o HTML de cada linha <tr>
    foreach ($clientes as $cliente) {
        echo "
            <tr>
                <td>" . htmlspecialchars($cliente['nome']) . "</td>
                <td>" . htmlspecialchars($cliente['rua']) . "</td>
                <td>" . htmlspecialchars($cliente['numero']) . "</td>
                <td>" . htmlspecialchars($cliente['cep']) . "</td>
                <td>" . htmlspecialchars($cliente['celular']) . "</td>
                <td>" . htmlspecialchars($cliente['email']) . "</td>
                <td>" . htmlspecialchars($cliente['nasc']) . "</td>
            </tr>
        ";
    }
?>