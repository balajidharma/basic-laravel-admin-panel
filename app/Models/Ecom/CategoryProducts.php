<?php

namespace App\Models\Ecom;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name'
    ];



    /**
     * Get the user that owns the phone.
     */
    public function products()
    {
        return $this->hasOne(Products::class,'category_id');
    }

}
