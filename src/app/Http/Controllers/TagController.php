<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('tags.create');
    }
}
