<?php

namespace App\Http;

class indexController extends Controller
{
    public function indexAction(){

        // dump(app()->get('config')->get('database.dbname'));

        return $this->render("index", ['title'=>"Index Page"]);
    }
}