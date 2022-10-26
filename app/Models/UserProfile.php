<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_picture',
        'user_addresses_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
