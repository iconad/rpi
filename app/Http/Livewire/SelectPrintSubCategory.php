<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SelectPrintSubCategory extends Component
{

    public $categories = [];
    public $product = null;
    public $nosubcategory = true;
    public $subCategories = null;
    public $selectedCategory = '';
    public $selectedSubCategory = '';

    public function mount($categories, $product) {
        $this->categories = $categories;
        $this->product = $product;


        if($product != null){

            if($product->subCategory) {
                $this->nosubcategory = false;
            }else{
                $this->nosubcategory = true;
            }

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
                if($this->product->subCategory){
                    if($catg->id == $this->product->subCategory->id) {
                        $this->selectedSubCategory = $catg->id;
                    }
                }else{
                    $this->selectedSubCategory = null;
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
        return view('livewire.select-print-sub-category');
    }
}
