<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardNavbarDropdown extends Component
{
    public $user = null;
    public $isDropDown = false;

    public function mount ($user) {
        $this->user = $user;
    }

    public function toggleDropDown () {
        $this->isDropDown = !$this->isDropDown;
    }

    public function render()
    {
        return view('livewire.dashboard-navbar-dropdown');
    }
}
