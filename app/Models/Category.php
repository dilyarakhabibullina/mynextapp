<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';



    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
    
}