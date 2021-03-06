<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SelectSubCategory extends Component
{

    public $categories = [];
    public $product = null;
    public $subCategories = null;
    public $selectedCategory = '';
    public $selectedSubCategory = '';

    public function mount($categories, $product) {
        $this->categories = $categories;
        $this->product = $product;

        if($product != null){
            foreach ($categories as $catg) {
                if($catg->id == $product->category->id) {
                    $this->selectedCategory = $catg->id;
                }
            }
        }else{
            if ($categories->count() != 0) {
                $this->selectedCategory = $categories[0]->id;
            }
        }

        $this->getSubCategories();

    }

    public function getSubCategories () {
        $subCategories = SubCategory::where('category_id', $this->selectedCategory)->get();

        if($this->product != null){
            foreach ($subCategories as $catg) {
                if($catg->id == $this->product->subCategory->id) {
                    $this->selectedSubCategory = $catg->id;
                }
            }
        }

        $this->subCategories = $subCategories;
    }

    public function onSelectSubCategory () {
        $this->selectedCategory = $this->selectedCategory;
    }

    public function render()
    {
        return view('livewire.select-sub-category');
    }
}
