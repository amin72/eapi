<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ProductNotBelongsToUser;
use App\Models\Review;
use Auth;


class Product extends Model
{
    use HasFactory;

    public function reviews() {
        return $this->hasMany(Review::class);
    }


    // Checks if current logged in user is the owner of the object
    // If user is not the owner, throws App\Exceptions\ProductNotBelongsToUser
    public function isOwner() {
        if ($this->user_id !== Auth::id()) {
            throw new ProductNotBelongsToUser;
        }
    }
}
