<?php

namespace App\Http;

class pageController extends Controller
{
    public function showAction($alias){
        return $this->render("page", ['alias'=>$alias]);
    }
}