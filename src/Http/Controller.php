<?php

namespace App\Http;

use App\System\View\View;
use Symfony\Component\HttpFoundation\Response;
use App\System\Controller\IController;

abstract class Controller implements IController
{
    protected $view;


//Constructor
    public function __construct()
    {
        $this->view = new View();
    }


//Render
    public function render($path, $data = [])
    {
        return new Response($this->view->make($path, $data));
    }


}