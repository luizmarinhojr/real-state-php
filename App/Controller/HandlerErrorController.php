<?php

namespace App\Controller;

final class HandlerErrorController {
    final public function error404() {
        require_once ROOT_PATH . 'app/view/pages/404.php';
    }
}