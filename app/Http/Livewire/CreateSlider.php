<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateSlider extends Component
{

    public $products = null;
    public $coverRadio = 'product';
    public $selectedProduct = [];
    public $cover = null;

    public function mount ($products) {
        $this->products = $products;
        $this->cover = $products[0];
        $this->selectedProduct = $products[0];
    }

    public function onSelectProduct ($value) {
        $this->cover = $this->selectedProduct;
    }

    public function render()
    {
        return view('livewire.create-slider');
    }

    // public function CreateSlider($value)
    // {
    //     $this->selectedProduct = json_encode($value);
    // }
}
