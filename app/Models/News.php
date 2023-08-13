<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class News extends Model
{
    use HasFactory;

protected $table = 'news';

protected $fillable =[
    'category_id',
    'title',
    'text',
    'author',
    'isPrivate'
];

public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
// public function getAll(): Collection
//     {
//         return DB::table($this->table)->get();
//     }

//     public function getItemById(int $id): mixed
//     {
//         return DB::table($this->table)->find($id);
//     }
}



