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
        // dd($profile->user->id);

        if (!Auth::user() || Auth::user()->id != $user->id) {
            return abort(403, 'User Forbidden');
        }

        return view('userprofile.index', ['profile' => $profile]);
    }
}
