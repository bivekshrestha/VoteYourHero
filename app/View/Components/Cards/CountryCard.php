<?php

namespace App\View\Components\Cards;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountryCard extends Component
{
    /**
     * @var string
     */
    public $country;

    /**
     * Create a new component instance.
     *
     * @param $country
     */
    public function __construct($country)
    {
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.country-card');
    }
}
