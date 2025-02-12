<?php

namespace App\Livewire\Ads;

use Livewire\Component;
use App\Models\Ad;

class AdItem extends Component
{
    public $ad;

    public function mount(Ad $ad)
    {
        $this->ads = $ad;
    }

    public function placeholder()
    {
        return view('livewire.ads.adanimate');
    }

    public function render()
    {
        return view('livewire.ads.ad-item');
    }
}

