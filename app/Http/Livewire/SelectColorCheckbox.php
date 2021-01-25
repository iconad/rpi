<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectColorCheckbox extends Component
{
    public function render()
    {
        return view('livewire.select-color-checkbox');
    }


    public $title = null;
    public $model = null;
    public $name = null;
    public $options = null;
    public $selectedOption = null;

    public function mount($model, $name, $options, $title) {
        $this->model = $model;
        $this->colors = $options;
        $this->title = $title;
        $this->name = $name;

        if ($model) {
            $this->selectedOption = $model->$name->id;
        }

    }


}
