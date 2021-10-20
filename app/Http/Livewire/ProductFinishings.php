<?php

namespace App\Http\Livewire;

use App\Models\Finishing;
use App\Models\FinishingOption;
use App\Models\SelectedFinishing;
use App\Models\SelectedOptions;
use Livewire\Component;

class ProductFinishings extends Component
{

    public $selectedOptionsIds = null;
    public $product = null;
    public $finishings = null;
    public $Sfinishings = null;
    public $checkedFinishings = [];

    public function mount($product) {
        $this->product = $product;
        $this->getFinishigs();
    }

    public function updating()
    {
        $this->getFinishigs();
    }

    public function refreshFinishings()
    {
        $this->getFinishigs();
    }

    public function getFinishigs () {
        $this->getSelectedOptionsIds();
        $finishings = Finishing::whereHas('options')->with('options', function ($query) {
            $query->whereNotIn('id', $this->selectedOptionsIds);
        })->get();
        $this->finishings = $finishings;
    }

    public function getSelectedOptionsIds () {
        // $selectedOptionsIds = SelectedOptions::pluck('option_id');
        $product = $this->product;
        $selectedOptionsIds = SelectedOptions::whereHas('selectedFinishing', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->pluck('option_id');
        // dd($selectedOptionsIds);
        $this->selectedOptionsIds = $selectedOptionsIds;
    }

    public function submitFinishings () {

        // return dd($this->checkedFinishings);

        foreach ($this->checkedFinishings as $op) {

            $option = FinishingOption::where('id', $op)->first();
            $finishing = $option->finishing;

            $checkFinsihing = SelectedFinishing::where('product_id', $this->product->id)->where('finishing_id', $finishing->id)->count();

            if($checkFinsihing == 0) {

                $this->Sfinishings = SelectedFinishing::create([
                    'product_id' => $this->product->id,
                    'finishing_id' => $finishing->id
                ]);

            }else {
                $this->Sfinishings = SelectedFinishing::where('product_id', $this->product->id)->where('finishing_id', $finishing->id)->first();
            }

            $product = $this->product;
            $checkOption = SelectedOptions::whereHas('selectedFinishing', function ($q) use ($product) {
                $q->where('product_id', $product->id);
            })->where('option_id', $op)->count();

            if($checkOption == 0) {
                SelectedOptions::create([
                    'selected_finishing_id' => $this->Sfinishings->id,
                    'title' => $option->title,
                    'price' => $option->price,
                    'finishing_id' => $finishing->id,
                    'option_id' => $op,
                    'days' => $option->days,
                ]);
            }

            $this->getFinishigs();
            $this->emitTo('product-selected-finishings', 'refreshComponent');


        }

    }

    public function render()
    {
        return view('livewire.product-finishings');
    }
}
