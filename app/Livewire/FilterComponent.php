<?php

namespace App\Livewire;

use Livewire\Component;

class FilterComponent extends Component
{

    public $search = '';
    public $result = [];


    public function render()
    {
        return view('livewire.filter-component');
    }
}
