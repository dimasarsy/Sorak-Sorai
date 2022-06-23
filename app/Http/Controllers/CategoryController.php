<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.categories', [
            'categories'    => Category::orderBy('name')->get()
        ]);
    }
    
}
