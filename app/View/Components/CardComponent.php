<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    public $title;
    public $amount;
    public $id;
    public function __construct($title, $amount, $id)
    {
        $this->title = $title;
        $this->amount = $amount;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-component');
    }
}
