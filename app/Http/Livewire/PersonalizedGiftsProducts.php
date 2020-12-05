<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\SubCategory;
use Livewire\Component;

class PersonalizedGiftsProducts extends Component
{

    public $subcategory = null;
    public $products = null;
    public $colors = null;
    public $selectedColors = null;
    public $isSidebar = false;

    public function mount($subcategory, $products, $colors, $selectedColors) {
        $this->subcategory = $subcategory;
        $this->products = $products;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
    }

    public function getProductsByColor ($color, $key) {

        if(!in_array($color, $this->selectedColors)){
            $this->selectedColors[] = $color;
            $this->getProducts();
        }else{
            foreach (array_keys($this->selectedColors, $color) as $key) {
                unset($this->selectedColors[$key]);
            }
            $this->getProducts();
        }

    }

    public function getProducts () {

        foreach ($this->selectedColors as $color) {
            if($color){
                $selectedColors[] = $color;
            }else{
                $selectedColors = [];
            }
        }

        if(count($selectedColors) === 0) {
            $selectedColors = $this->colors->pluck('id');
        }


        $subcategory = SubCategory::whereHas('products')->with([
            'products' => function($q1) use ($selectedColors) {
                $q1->where('status', 1);
                $q1->whereHas('variants.color', function($q2) use ($selectedColors) {
                    $q2->whereIn('color_id', $selectedColors);
                });
            },
            'products.variants' => function($q2) use ($selectedColors)  {
                $q2->where('status', 1);
            }
        ])->where('slug', $this->subcategory->slug)->first();


        $this->subcategory = $subcategory;
    }

    public function render()
    {
        return view('livewire.personalized-gifts-products');
    }
}
