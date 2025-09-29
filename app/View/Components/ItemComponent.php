<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemComponent extends Component
{
    public $name;
    public $price;
    // public $category;
    public $image;

    public function __construct($name, $price, $image)
    {
        $this->name = $name;
        $this->price = $price;
        // $this->category = $category;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-component');
    }
}
