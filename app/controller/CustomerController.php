<?php 
class CustomerController {
    public function index(): void {
        $customers = [
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
        require_once ROOT_PATH . 'app/view/pages/main.php';
    }

    public function create(): void {
        require_once ROOT_PATH . 'app/view/pages/create.php';
    }
}   
