<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestBackground extends Component
{
    public $height;

    /**
     * Create a new component instance.
     */
    public function __construct($height = 'h-90-screen')
    {
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.test-background');
    }
}
