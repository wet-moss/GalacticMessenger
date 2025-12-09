<?php
namespace App;

require_once 'autoload.php';

class Marsh
{
    private $data = [
        "{^/news/(page-(\d+)/)?$}" => [
            'controller' => 'App\Controllers\NewsController',
            'action' => 'showList',
            'args' => ['page' => 2]
        ],

        "{^/news/(\d+)/$}" => [
            'controller' => 'App\Controllers\NewsController',
            'action' => 'showItemDetails',
            'args' => ['id' => 1]
        ],

        "(^/$)" => [
            'controller' => 'App\Controllers\MainController',
            'action' => 'showMainPage',
            'args' => []
        ]
    ];

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $this->checkUri($uri, $this->data);
    }

    public function checkUri ($uri, $data) 
    {   
    foreach ($data as $pattern => $relations) {
        if (preg_match($pattern, $uri, $matches)) {
            return $this->showPage($relations, $matches);
        }
    }

    $baseController = new Controllers\BasedController();
    $baseController->showPage404();
    }

    public function showPage($relations, $matches) 
    {
        $controller = $relations['controller'];
        $action = $relations['action'];
        $args = $relations['args'];

        $pageController = new $controller();

        if ($args) {
            foreach ($args as $key => $index) {
                $info[$key] = $matches[$index] ?? 1;
            };

            return $pageController->$action($info);
        }

        return $pageController->$action();
    }
}

new Marsh();