<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DepartmentComponent extends Component
{
    public $department;
    public $username;

    /**
     * Create a new component instance.
     */
    public function __construct($department, $username)
    {
        $this->department = $department;
        $this->username = $username;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.department-component');
    }
}
