<?php

// app/Http/Livewire/Navbar.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu; // Make sure to import the Menu model

class Navbar extends Component
{
    public $menuItems;

    public function mount()
    {
        // Fetch menu items from the database and store them in the $menuItems property
        $this->menuItems = Menu::all();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
