<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ColorPicker extends Component
{

    public $color = null;
    public $colors = null;
    public $selectedColor = null;

    public function mount ($colors, $color) {
        $this->colors = $colors;
        $this->color = $color;

        foreach ($colors as $col) {
            if($col->id == $color->id) {
                $this->selectedColor = $col;
            }
        }
    }


    public function render()
    {
        return view('livewire.color-picker');
    }
}
