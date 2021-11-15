<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SelectSubCategory extends Component
{

    public $categories = [];
    public $priceTypes = ['fixed price', 'custom size', 'packages'];
    public $priceType = 'fixed price';
    public $product = null;
    public $width = null;
    public $height = null;
    public $subCategories = null;
    public $nosubcategory = true;
    public $isUpdate = null;
    public $selectedCategory = '';
    public $selectedSubCategory = '';

    public function mount($categories, $product, $isUpdate) {
        $this->categories = $categories;
        $this->product = $product;
        $this->isUpdate = $isUpdate;

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

        if($isUpdate) {
            $this->width = $this->product->width;
            $this->height = $this->product->height;
            $this->priceType = $this->product->pricing_type;
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
