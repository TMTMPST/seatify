<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Band;

class BandBiodata extends Component
{
    public $band;

    public function __construct()
    {
        $this->band = Band::with('members')->first();
    }

    public function render()
    {
        return view('components.band-biodata');
    }
}
