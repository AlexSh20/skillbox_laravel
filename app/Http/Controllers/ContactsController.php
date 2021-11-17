<?php

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    public function index()
    {
        $title = "Контакты";
        return view('contacts', compact('title'));

    }
}
