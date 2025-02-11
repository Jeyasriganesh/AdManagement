<?php

namespace App\Livewire\Ads;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On; 
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\URL;
use Illuminate\Http\Request;



class CreateAd extends Component
{

    public $current = 'ads.step-one';
    public $title, $description, $price, $category, $location;

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
    protected $steps = [
        0 => 'ads.step-one',
        1 => 'ads.step-two',
    ];

    #[URL(keep: true)]
    public $id = '';
    

    public function save()
    {

        $this->dispatch('form-submitted', id: $this->id);     
      
    }

    public function next()
    {
        if ($this->current === 'ads.step-one') {
            $this->dispatch('step1-validation'); 
         }
        

    }

    #[On('step1-validated')] 
    public function goToNextStep()
    {
        
        $currentIndex = array_search(trim($this->current), array_map('trim', $this->steps), true);

        if ($currentIndex !== false && isset($this->steps[$currentIndex + 1])) {
            $this->current = $this->steps[$currentIndex + 1];
        }

    }

    public function render()
    {
        return view('livewire.ads.create-ad');
    }

    public function mount(Request $request)
    {
        $this->id = $request->id; // Get adId from the URL

        if ($this->id) {
            $ad = Ad::find($this->id);
            if ($ad) {
                $this->title = $ad->title;
                $this->description = $ad->description;
                $this->price = $ad->price;
                $this->category = $ad->category;
                $this->location = $ad->location;
            }
        }
    }

    #[On('ad-created')] 
    public function updateAdId($id)
    {
        $this->id = $id;
    }



}
