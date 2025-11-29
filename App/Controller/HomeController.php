<?php 

namespace App\Controller;

use App\Usecase\HomeUsecase;

final class HomeController 
{
    private readonly HomeUsecase $homeUsecase;
    
    public function __construct(HomeUsecase $homeUsecase) {
        $this->homeUsecase = $homeUsecase;
    }

    final public function home() 
    {
        $customers = $this->homeUsecase->lastAddedCustomers(null);
        require_once VIEW . 'pages/home.php';
    }
}