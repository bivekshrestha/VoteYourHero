<?php

namespace App\View\Components\Cards;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroCard extends Component
{
    /**
     * @var string
     */
    public $hero;
    public $index;

    /**
     * Create a new component instance.
     *
     * @param $hero
     * @param $index
     */
    public function __construct($hero, $index)
    {
        $this->hero = $hero;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.hero-card');
    }
}
