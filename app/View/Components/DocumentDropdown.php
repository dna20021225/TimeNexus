<?php

// app/View/Components/DocumentDropdown.php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentDropdown extends Component
{
    public $category;
    public $items;

    public function __construct($category, $items)
    {
        $this->category = $category;
        $this->items = $items;
    }

    public function render()
    {
        return view('components.document-dropdown');
    }
}