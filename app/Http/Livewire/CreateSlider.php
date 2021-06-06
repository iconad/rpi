<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CreateSlider extends Component
{

    public $products = null;
    public $coverRadio = 'product';
    public $selectedProduct = '';
    public $product = null;

    public function mount($products) {
        $this->products = $products;
        $this->selectedProduct = $products[0]->id;

        if($this->product == null){
            $this->getProduct();
        }

    }

    public function getProduct () {

        $product = Product::where('id', $this->selectedProduct)->first();
        $this->product = $product;

    }

    public function onSelectProduct () {

        $product = Product::where('id', json_decode($this->selectedProduct)->id)->first();
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.create-slider');
    }

}
