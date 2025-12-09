<?php
namespace App;

class Dispatcher
{
    private $data = [
        "{^/news/(page-(\d+)/)?$}" => [
            'controller' => 'NewsController',
            'action' => 'showList',
            'args' => ['page' => 2, 'id' => 1]
        ],

        "{^/news/(\d+)/$}" => [
            'controller' => 'NewsController',
            'action' => 'showItemDetails',
            'args' => ['id' => 1]
        ],

        "(^/$)" => [
            'controller' => 'MainController',
            'action' => 'showMainPage',
            'args' => []
        ]
    ];

    public function __construct($uri)
    {
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
        $controller = "App\\Controllers\\" . $relations['controller'];
        $action =   $relations['action'];
        $args = $relations['args'];

        $pageController = new $controller();
        if ($args) {
            foreach ($args as $index) {
                $info[] = $matches[$index] ?? 1;
            };

            return $pageController->$action(...$info);
        }

        return $pageController->$action();
    }
}