<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


#[Layout('components.layouts.app')]
class Register extends Component
{
    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:6|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registration successful! Please log in.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
