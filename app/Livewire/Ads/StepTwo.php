<?php

namespace App\Livewire\Ads;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use App\Models\Ad;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;



class StepTwo extends Component
{
    public $id;
    // #[Validate('nullable|image|max:1024')]
    public $image;
    public $existingImage;

    protected function rules()
    {
        return [

            'image' => 'required|image|max:1024', // Max 1MB
        ];
    }

    use WithFileUploads;

    public function render()
    {
        return view('livewire.ads.step-two');
    }

    #[On('form-submitted')]

    public function step2validation($id)
    {

         $this->validate();

        // dd($this->image);

         if ($this->image) {
            // Delete old image if exists
            if ($this->existingImage) {
                Storage::delete('public/' . $this->existingImage);
            }

            // Store new image
            $imagePath = $this->image->store('ads', 'public');

            $ad = Ad::find($id);
            if ($ad) {
                $ad->update(['image' => $imagePath]);
            }
        }


        session()->flash('message', 'Ad updated successfully!');
        //$this->dispatch('refreshComponent');
        return redirect()->route('ads.manage');
    }

    public function mount($id = null)
    {

        if ($id) {

            $ad = Ad::find($id);

           // dd($ad->image);
            if ($ad) {

                $this->image = $ad->image;
                $this->existingImage = $ad->image;
            }
        }
    }
}
