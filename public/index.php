<?php 
    require_once '../vendor/autoload.php';

    use App\Controller\Controller;

    session_start();
    
    date_default_timezone_set('America/Sao_Paulo');
    define('ROOT_PATH', dirname(__DIR__) . '/');
    define('VIEW', ROOT_PATH . '/App/view/');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $publicRoutes = [
        '/login',
        '/cadastrar',
        '/logout'
    ];

    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (!in_array($requestUri, $publicRoutes) && !Controller::isAuthenticated()) {
        header("Location: /login"); 
        exit;
    }

    switch ($requestUri) {
        case '/':
            Controller::initHome()->home();
            break;
        
        case '/login':
            Controller::initAuth()->signin();
            break;
        
        case '/cadastrar':
            Controller::initAuth()->signup();
            break;

        case '/clientes':
            Controller::initCustomer()->list();
            break;

        case '/clientes/detalhar':
            Controller::initCustomer()->detail();
            break;

        case '/clientes/cadastrar':
            Controller::initCustomer()->create();
            break;

        case '/clientes/atualizar':
            Controller::initCustomer()->update();
            break;
        
        case '/clientes/excluir':
            Controller::initCustomer()->delete();
            
        default:
            require_once VIEW . 'pages/404.php';;
    }
