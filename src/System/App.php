<?php

namespace App\System;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Responce;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\RouteCollection;

use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;


class App{

    private $request;
    private $router;
    private $routes;
    private $requestContext;
    private $controller;
    private $arguments;
    private $basePath;
     
    private static $instance = null;


//Singleton pattern
    public static function getInstance($basepath)
    {
        if(is_null(static::$instance))
        {
            static::$instance = new static($basepath);
        }
        return static::$instance;
    }


//Constructor
    private function __construct($basepath)
    {
        $this->basePath = $basepath;

        $this->setRequest();
        $this->setRequestContext();
        $this->setRouter();
        
        $this->routes = $this->router->getRouteCollection();
    }

//Clone
    private function __clone()
    {

    }


//Wakeup
    private function __wakeup()
    {

    }


//Request
    private function setRequest()
    {
        $this->request = Request::createFromGlobals();  
    }

    public function getRequest()
    {
        return $this->request;
    }


//RequestContext
    private function setRequestContext()
    {
        $this->requestContext = new RequestContext();
        $this->requestContext->fromRequest($this->request);
    }

    public function getRequestContext()
    {
        return $this->$requestContext;
    }


//Router
    private function setRouter()
    {
        $fileLocator = new FileLocator(array(__DIR__));

        $this->router = new Router(
            new YamlFileLoader($fileLocator),
            $this->basePath.'/config/routes.yaml',
            array('cache_dir' => $this->basePath.'/storage/cache/')
        );
    }
//Controller
    public function getController()
    {
        return (new ControllerResolver())->getController($this->request);
    }

//Run
    public function run()
    {
        $matcher = new Routing\Matcher\UrlMatcher($this->routes, $this->requestContext);
        try 
        {   
            $this->request->attributes->add($matcher->match($this->request->getPathInfo()));

            $controller = $this->getController();

            dd($controller);

            //$arguments = $this->getArguments($controller);
        } 
        catch (\Exception $e) 
        {
            exit ('error');
        }
    }
} 