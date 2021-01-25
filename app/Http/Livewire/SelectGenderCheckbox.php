<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectGenderCheckbox extends Component
{
    public function render()
    {
        return view('livewire.select-gender-checkbox');
    }

    public $selectedOptions = [];

    // public function mount($model, $options, $title) {
    //     $this->product = $model;
    //     $this->colors = $options;
    //     $this->title = $title;
    // }
}
