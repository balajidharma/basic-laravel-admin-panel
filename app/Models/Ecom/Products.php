<?php

namespace App\Models\Ecom;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'category_id',
        'title',
        'description',
        'deactivated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'store_user');
    }


}
