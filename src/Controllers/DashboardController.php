<?php


namespace Laramin\Controllers;


use Laramin\Models\CrudModel;

class DashboardController
{
    public function __invoke()
    {
        return view('vendor.laramin.dashboard', ['models' => CrudModel::all()]);
    }
}