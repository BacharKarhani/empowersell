<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review_text'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_product', 'review_id', 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
