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

    public function showDocument($category, $id)
    {
        $categoriesWithItems = DocumentCategory::getCategoriesWithItems();
        
        if (!isset($categoriesWithItems[$category][$id])) {
            abort(404);
        }

        $documentName = $categoriesWithItems[$category][$id];
        
        // ここで実際の文書処理ロジックを実装します
        // 例: return view('documents.show', compact('documentName'));
        
        return "表示: {$category}カテゴリの{$documentName}";
    }
}