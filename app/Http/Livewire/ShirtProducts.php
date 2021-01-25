<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShirtProducts extends Component
{

    public $category = null;
    public $products = null;
    public $colors = null;
    public $selectedColors = null;
    public $selectedGenders = null;
    public $selectedNecks = null;
    public $selectedMaterials = null;
    public $selectedTypes = null;
    public $isSidebar = false;

    public function mount(
        $category,
        $products,
        $colors,
        $selectedGenders,
        $selectedNecks,
        $selectedMaterials,
        $selectedTypes,
        $selectedColors
        ) {

        $this->category = $category;
        $this->products = $products;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
        $this->selectedGenders = $selectedGenders;
        $this->selectedNecks = $selectedNecks;
        $this->selectedMaterials = $selectedMaterials;
        $this->selectedTypes = $selectedTypes;

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


        $category = Category::whereHas('products')->with([
            'products' => function($q1) use ($selectedColors) {
                $q1->where('status', 1);
                $q1->whereHas('variants.color', function($q2) use ($selectedColors) {
                    $q2->whereIn('color_id', $selectedColors);
                });
            },
            'products.variants' => function($q2) use ($selectedColors)  {
                $q2->where('status', 1);
            }
        ])->where('slug', $this->category->slug)->first();


        $this->category = $category;
    }


    public function render()
    {
        return view('livewire.shirt-products');
    }
}
