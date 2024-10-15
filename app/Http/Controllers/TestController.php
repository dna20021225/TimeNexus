<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;

class TestController extends Controller
{
    public function dashboard()
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        return view('dashboard', compact('categoriesWithItems'));
    }
}