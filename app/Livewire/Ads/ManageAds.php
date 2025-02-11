<?php
namespace App\Livewire\Ads;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class ManageAds extends Component
{
    public $ads;

    #[On('adUpdated')] // Auto refresh when an ad is updated
    #[On('adDeleted')] // Auto refresh when an ad is deleted
    public function loadAds()
    {
        $this->ads = Ad::where('user_id', Auth::id())->latest()->get(); // Fetch only user's ads
    }

    public function deleteAd($adId)
    {
        $ad = Ad::find($adId);
        if ($ad && $ad->user_id == Auth::id()) {
            $ad->delete();
            $this->dispatch('adDeleted'); // Refresh UI
            session()->flash('message', 'Ad deleted successfully.');
        }
    }

    public function EditAd($adId)
    {
        return redirect()->route('ads.create', ['id' => $adId]);
    }
    
    public function render()
    {
        $this->loadAds();
        return view('livewire.ads.manage-ads');
    }

}

