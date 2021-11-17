<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $title = "Главная страница";
        return view('welcome', compact('title'));
    }
}
