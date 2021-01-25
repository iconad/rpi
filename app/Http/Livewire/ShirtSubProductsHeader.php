<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShirtSubProductsHeader extends Component
{

    public $subCategory = null;
    public $colors = null;
    public $selectedColors = null;
    public $isSidebar = false;


    public function mount($subCategory, $colors, $selectedColors) {
        $this->category = $subCategory;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
    }

    public function toggleSidbar () {
        $this->isSidebar = !$this->isSidebar;
        $this->isSidebarServer = $this->isSidebar;
    }


    public function render()
    {
        return view('livewire.shirt-sub-products-header');
    }
}
