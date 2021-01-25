<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GiftProductsHeader extends Component
{

    public $subcategory = null;
    public $colors = null;
    public $selectedColors = null;
    public $isSidebar = false;


    public function mount($subcategory, $colors, $selectedColors) {
        $this->subcategory = $subcategory;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
    }

    public function toggleSidbar () {
        $this->isSidebar = !$this->isSidebar;
        $this->isSidebarServer = $this->isSidebar;
    }



    public function render()
    {
        return view('livewire.gift-products-header');
    }
}
