<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pagesbycategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $pages;
    public $cid;

    public function __construct($pages, $cid)
    {
        $this->pages = $pages;
        $this->cid = $cid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.pagesbycategory');
    }
}
