<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleDropdown extends Component
{
    public $label;
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $items)
    {
        $this->label = $label;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.simple-dropdown');
    }
}
