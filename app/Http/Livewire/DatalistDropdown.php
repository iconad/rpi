<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DatalistDropdown extends Component
{

    public $collection = null;
    public $selectedItem = null;
    public $selectedId = null;
    public $paperId = null;

    public function mount($collection, $paperId) {
        $this->collection = $collection;

        if($paperId != null) {
            foreach ($collection as $value) {
                if($value->id === $paperId) {
                    $this->selectedItem = $value->title .' - ' . $value->side . ' ' . '('.$value->id.')';
                    $this->selectedId = $paperId;
                }
            }
        }

        $this->paperId = $paperId;


    }

    public function updatedSelectedItem () {
        if($this->selectedItem != null || $this->selectedItem != "") {
            if(preg_match_all('/\d+/', $this->selectedItem, $numbers))
            $lastnum = end($numbers[0]);
            $this->selectedId = $lastnum;
        }else{
            $this->selectedId = null;
        }
    }

    public function getIdFromString ($item) {
        if(preg_match_all('/\d+/', $item, $numbers))
        $lastnum = end($numbers[0]);
        return $lastnum;
    }

    public function render()
    {
        return view('livewire.datalist-dropdown');
    }
}
