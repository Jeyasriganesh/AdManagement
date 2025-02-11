<?php
namespace App\Livewire\Ads;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ManageAds extends Component
{
    public $search = '';
    public $category = '';
    public $minPrice;
    public $maxPrice;

    protected $queryString = ['search', 'category', 'minPrice', 'maxPrice'];

    use WithPagination;
    // #[On('adUpdated')] // Auto refresh when an ad is updated
    // #[On('adDeleted')] // Auto refresh when an ad is deleted
    // public function loadAds()
    // {
    //     $this->ads = Ad::where('user_id', Auth::id())->latest()->get(); // Fetch only user's ads
    // }

    protected $listeners = ['adDeleted' => 'refreshAds','adUpdated'=>'refreshAds'];

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
    
    public function refreshAds()
    {
        $this->resetPage(); // Reset pagination
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingMinPrice()
    {
        $this->resetPage();
    }

    public function updatingMaxPrice()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Ad::where('user_id', Auth::id())->latest();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->category)) {
            $query->where('category', $this->category);
        }

        if (!empty($this->minPrice)) {
            $query->where('price', '>=', $this->minPrice);
        }

        if (!empty($this->maxPrice)) {
            $query->where('price', '<=', $this->maxPrice);
        }

        return view('livewire.ads.manage-ads', [
            'ads' => $query->paginate(5)
        ]);
    }
}

