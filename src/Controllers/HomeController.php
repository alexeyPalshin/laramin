<?php


namespace Laramin\Controllers;


class HomeController
{
    public function __invoke()
    {
        return view('laramin.home');
    }
}