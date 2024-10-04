<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestDesign extends Component
{
    /**
     * Create a new component instance.
     */
    protected $title;
    protected $search;
    // protected $list;
    // protected $folder;
    // protected $show = '';

    public function __construct($title,$search)
    {
        $this->title = $title;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $search = $this->search;
        return view('components.guest-design', compact('title','search'));
    }
}
