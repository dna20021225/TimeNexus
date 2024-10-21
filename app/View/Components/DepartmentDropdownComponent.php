<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DepartmentDropdownComponent extends Component
{
    public $selectedOption;
    public $options;

    public function __construct($selectedOption = 'Awesomeness Level')
    {
        $this->selectedOption = $selectedOption;
        $this->options = [
            'ridiculous',
            'reasonable',
            'lacking',
            'awesomeless'
        ];
    }

    public function render()
    {
        return view('components.department-dropdown-component');
    }
}