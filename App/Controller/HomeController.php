<?php 

namespace App\Controller;

final class HomeController {
    final public function home() {
        require_once VIEW . 'pages/home.php';
    }
}