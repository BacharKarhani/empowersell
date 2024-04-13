<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'address',
        'profile_picture',
        'phone_number',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class); // Define the one-to-many relationship
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
