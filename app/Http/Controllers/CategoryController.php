<?php

namespace App\Http\Controllers;

use App\Models\categories;

class categoriesController extends Controller
{
    public function index()
    {
        return view('categories.categories', [
            'categories'    => categories::orderBy('name')->get()
        ]);
    }
    
}
