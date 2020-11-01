<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    
    public function show(Category $category){
        //return $category->projects()->with('category')->orderBy('created_at', 'DESC')->paginate();
        return view('categories.show', [
            'projects' => $category->projects()->with('category')->orderBy('created_at', 'DESC')->paginate(),
        ]);
    }

}
