<?php

namespace App\Controller;

final class HandlerErrorController {
    final public function error404() {
        require_once VIEW . 'pages/404.php';
    }
}