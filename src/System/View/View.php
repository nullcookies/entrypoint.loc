<?php

namespace App\System\View;

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

class View implements IView
{
    private $templating;


//Constructor
    public function __construct()
    {
        $filesystemLoader = new FilesystemLoader(BASEPATH.'/resources/views/%name%.php');
        $this->templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
    }


//Make
    public function make($path, $data = [])
    {
        return $this->templating->render($path, $data);
    }
}