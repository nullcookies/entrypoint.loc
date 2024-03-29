<?php

namespace App\System;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
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

    private $container = [];
     
    private static $instance = null;


//Singleton pattern
    public static function getInstance($basepath = null)
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


//Arguments
    public function getArguments($controller)
    {
        return (new ArgumentResolver())->getArguments($this->request, $controller);
    }


//Run
    public function run()
    {
        $response = null;
        $matcher = new Routing\Matcher\UrlMatcher($this->routes, $this->requestContext);
        try 
        {   
            $this->request->attributes->add($matcher->match($this->request->getPathInfo()));

            $this->controller = $this->getController();
            $this->arguments = $this->getArguments($this->controller);

            $response = call_user_func_array($this->controller, $this->arguments);
        } 
        catch (\Exception $e) 
        {
            dd($e);
            exit($e);
        }

        $response->send();
    }


//Container
    public function add($key, $object)
    {
        $this->container[$key] = $object;
        return $object;
    }


    public function get($key)
    {
        if(isset($this->container[$key]))
        {
            return $this->container[$key];
        }
        else
        {
            return null;
        }
    }
} 