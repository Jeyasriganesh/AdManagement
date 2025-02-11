<?php

namespace App\Livewire\Ads;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class StepOne extends Component
{

    public $title, $description, $price, $category, $location;

    public $id;

    protected function rules()
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category' => 'required',
            'location' => 'required',
            //'image' => 'nullable|image|max:1024', // Max 1MB
        ];
    }

    #[On('step1-validation')] 
    public function step1Validation()
    {        
        $this->validate();
    
        if ($this->id) {
            // Update existing ad
            $ad = Ad::find($this->id);
    
            if ($ad && $ad->user_id == Auth::id()) { // Ensure user owns the ad
                $ad->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'price' => $this->price,
                    'category' => $this->category,
                    'location' => $this->location,
                ]);
            }
        } else {
            // Create new ad
            $ad = Ad::create([
                'user_id' => Auth::id(),
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category' => $this->category,
                'location' => $this->location,
            ]);
    
            // Assign the new ID
            $this->id = $ad->id;
        }
    
        // Dispatch events
        $this->dispatch('ad-created', id: $this->id);
        $this->dispatch('step1-validated');
    }
    
 
    public function render()
    {
        return view('livewire.ads.step-one');
    }

   
    public function mount($id = null)
    {
        if ($id) {
            $this->id = $id;
            $ad = Ad::find($id);
            if ($ad) {
                $this->title = $ad->title;
                $this->description = $ad->description;
                $this->price = $ad->price;
                $this->category = $ad->category;
                $this->location = $ad->location;
            }
        }
    }

}
