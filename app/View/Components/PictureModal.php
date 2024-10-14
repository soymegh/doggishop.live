<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PictureModal extends Component
{
    /**
     * Create a new component instance.
     */
    protected $element;
    public function __construct($element)
    {
        $this->element= $element;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $element = $this->element;
        return view('components.picture-modal',compact('element'));
    }
}
