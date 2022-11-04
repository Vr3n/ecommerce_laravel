<?php

namespace App\Http\Livewire;

use App\Models\UserMobileNumbers;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class MobileNumber extends ModalComponent
{
    public UserMobileNumbers $user_mobile_number;

    public UserMobileNumbers $mobile_numbers;

    protected $rules = [
        'user_mobile_number.mobile_number' => 'required|max:10',
    ];

    public function render()
    {
        return view('livewire.mobile-number');
    }

    public function mount()
    {
        $this->user_mobile_number = new UserMobileNumbers();
    }

    public function mobileSubmitHandler()
    {
        $this->validate();

        if (Auth::user()->mobile_numbers->isEmpty()) {
            $this->user_mobile_number->is_primary = true;
        }

        $this->user_mobile_number->user_id = Auth::user()->id;

        $this->user_mobile_number->save();

        session()->flash('message', 'Mobile Number Successfully saved!');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
