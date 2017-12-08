<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function index() {
        return view('index');
    }

    public function pageNotFound() {
        return view('404');
    }
}