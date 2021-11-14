<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WallpaperProductsHeader extends Component
{


    public $subcategory = null;
    public $colors = null;
    public $selectedColors = null;
    public $materials = null;
    public $selectedMaterials = null;
    public $isSidebar = false;

    public function mount($subcategory, $colors, $selectedColors, $materials, $selectedMaterials) {
        $this->subcategory = $subcategory;
        $this->colors = $colors;
        $this->selectedColors = $selectedColors;
        $this->materials = $materials;
        $this->selectedMaterials = $selectedMaterials;
    }

    public function toggleSidbar () {
        $this->isSidebar = !$this->isSidebar;
        $this->isSidebarServer = $this->isSidebar;
    }


    public function render()
    {
        return view('livewire.wallpaper-products-header');
    }
}
