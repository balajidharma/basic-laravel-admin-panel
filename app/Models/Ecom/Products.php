<?php

namespace App\Models\Ecom;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'deactivated_at',
        'price',
        'count',
    ];
    public $timestamps = true;


    public function users()
    {
        return $this->belongsToMany(User::class, 'store_user');
    }


    public function categoryProducts()
    {
        return $this->belongsTo(CategoryProducts::class,'category_id');
    }




}
