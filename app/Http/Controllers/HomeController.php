<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('home.index',compact('categories'));
    }
}
