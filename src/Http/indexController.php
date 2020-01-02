<?php

namespace App\Http;

class indexController extends Controller
{
    public function indexAction(){
        return $this->render("index", ['title'=>"Index Page"]);
    }
}