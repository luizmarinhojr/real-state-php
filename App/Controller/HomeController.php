<?php 

namespace App\Controller;

final class HomeController {
    final public function home() {
        if (isset($_SESSION['user_logged_in'])) {
            echo "Usuário está logado. ID da sessão: " . session_id();
            echo "ID do Usuário: " . $_SESSION['user_id'];
            
            // Debug completo:
            var_dump($_SESSION);
        } else {
            echo "Nenhum usuário logado.";
        }
        require_once VIEW . 'pages/home.php';
    }
}