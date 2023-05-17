<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id'
    ];

    protected $casts = [
      "parent_id"
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}