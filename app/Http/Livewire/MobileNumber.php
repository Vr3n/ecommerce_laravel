<?php

namespace App\Http\Livewire;

use App\Models\UserMobileNumbers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MobileNumber extends Component
{
    public UserMobileNumbers $user_mobile_number;

    public $show = false;


    protected $listeners = [
        'show' => 'show',
        'close' => 'close',
    ];


    protected $rules = [
        'user_mobile_number.mobile_number' => 'required|max:10',
    ];

    public function render()
    {
        return view(
            'livewire.mobile-number',
            [
                'mobile_numbers' => Auth::user()->mobile_numbers()->latest()->get()
            ]
        );
    }

    public function mount()
    {
        $this->user_mobile_number = new UserMobileNumbers();
    }

    public function show()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
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
        $this->user_mobile_number->mobile_number = '';
    }


    public function deleteUserMobileNumberHandler(UserMobileNumbers $mobile_number)
    {
        $mobile_number->delete();

        session()->flash('message', 'Mobile number Deleted Successfully!');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function modalMaxWidthClass(): string
    {
        return 'xl';
    }
}
