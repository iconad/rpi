<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShirtProductsHeader extends Component
{

    public $category = null;
    public $colors = null;
    public $selectedColors = null;
    public $isSidebar = false;


    public function mount($category, $colors, $selectedColors) {
        $this->category = $category;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
    }

    public function toggleSidbar () {
        $this->isSidebar = !$this->isSidebar;
        $this->isSidebarServer = $this->isSidebar;
    }


    public function render()
    {
        return view('livewire.shirt-products-header');
    }
}
