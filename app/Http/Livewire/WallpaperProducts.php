<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\SubCategory;
use Livewire\Component;

class WallpaperProducts extends Component
{

    public $subcategory = null;
    public $products = null;
    public $colors = null;
    public $selectedColors = null;
    public $materials = null;
    public $selectedMaterials = null;
    public $isSidebar = false;


    public function mount($subcategory, $products, $colors, $selectedColors, $selectedMaterials, $materials) {
        $this->subcategory = $subcategory;
        $this->products = $products;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
        $this->materials = $materials;
        $this->selectedMaterials = $selectedMaterials;
    }

    public function getProductsByMaterial ($material, $key) {

        if(!in_array($material, $this->selectedMaterials)){
            $this->selectedMaterials[] = $material;
            $this->getProducts();
        }else{
            foreach (array_keys($this->selectedMaterials, $material) as $key) {
                unset($this->selectedMaterials[$key]);
            }
            $this->getProducts();
        }

    }

    public function getProducts () {

        foreach ($this->selectedMaterials as $material) {
            if($material){
                $selectedMaterials[] = $material;
            }else{
                $selectedMaterials = [];
            }
        }

        if(count($selectedMaterials) === 0) {
            $selectedMaterials = $this->materials->pluck('id');
        }


        $subcategory = SubCategory::whereHas('products')->with([
            'products' => function($q1) use ($selectedMaterials) {
                $q1->where('status', 1);
                $q1->whereHas('variants.color', function($q2) use ($selectedMaterials) {
                    $q2->whereIn('color_id', $selectedMaterials);
                });
            },
            'products.variants' => function($q2) use ($selectedMaterials)  {
                $q2->where('status', 1);
            }
        ])->where('slug', $this->subcategory->slug)->first();


        $this->subcategory = $subcategory;
    }

    public function render()
    {
        return view('livewire.wallpaper-products');
    }
}
