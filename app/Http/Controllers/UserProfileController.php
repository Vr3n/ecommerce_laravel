<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display the User Profile View.
     * 
     * @param User $user
     */
    public function index(User $user)
    {

        // dd($user->profile->id);
        $profile = UserProfile::findOrFail($user->profile->id);

        if (!Auth::user() || Auth::user()->id != $user->id) {
            return abort(403, 'User Forbidden');
        }

        $mobile_number = Auth::user()->mobile_numbers->where('is_primary', 1);
        $email = Auth::user()->email;

        if (!$profile) {
            return redirect()->back();
        }

        return view('userprofile.index', ["mobile_number" => $mobile_number, "email" => $email]);
    }
}
