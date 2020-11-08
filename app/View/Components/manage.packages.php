<?php

namespace App\View\Components;

use Illuminate\View\Component;

class manage.packages extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $packages;
    public $pid;

    public function __construct($pid, $packages)
    {
        $this->pid = $pid;
        $this->packages = $packages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.manage.packages');
    }
}
