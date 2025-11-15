<?php 
    require_once '../vendor/autoload.php';

    use App\Controller\Controller;
    
    define('ROOT_PATH', dirname(__DIR__) . '/');
    define('VIEW', ROOT_PATH . '/App/view/');
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($requestUri) {
        case '/':
            Controller::initHome()->home();
            break;

        case '/clientes':
            Controller::initCustomer()->index();
            break;

        case '/clientes/cadastrar':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Controller::initCustomer()->create();
            } else {
                Controller::initCustomer()->detail();
            }
            break;

        case '/clientes/atualizar':
            Controller::initCustomer()->update();
            break;
            
        default:
            Controller::initHandlerError()->error404();
    }
