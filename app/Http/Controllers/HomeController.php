<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Manage a unique route
    public function __invoke() {
        return view('home');
    }
}
