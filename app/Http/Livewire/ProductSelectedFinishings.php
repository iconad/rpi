<?php

namespace App\Http\Livewire;

use App\Models\Finishing;
use App\Models\FinishingOption;
use App\Models\SelectedFinishing;
use App\Models\SelectedOptions;

use Livewire\Component;

class ProductSelectedFinishings extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $product = null;
    public $finishings = null;
    public $isDeleteModal = false;
    public $deletingOption = null;


    public function mount($product) {

        $this->product = $product;
        $this->getSelectedFinishigs();

    }

    public function refreshFinishings()
    {
        $this->getSelectedFinishigs();
    }

    public function getSelectedFinishigs () {
        $finishings = SelectedFinishing::where('product_id', $this->product->id)->get();
        $this->finishings = $finishings;
    }

    public function confirmDelete ($option) {
        $this->isDeleteModal = true;
        $this->deletingOption = $option;
    }

    public function cancelDelete () {
        $this->isDeleteModal = false;
    }

    public function deleteOption () {

        $option = SelectedOptions::where('id', $this->deletingOption['id'])->get();
        // return dd($option[0]);
        $option[0]->delete();
        $this->isDeleteModal = false;
        $this->getSelectedFinishigs();

    }


    public function render()
    {
        return view('livewire.product-selected-finishings');
    }
}
