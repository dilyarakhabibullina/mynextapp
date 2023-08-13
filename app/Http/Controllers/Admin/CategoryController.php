<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class CategoryController extends Controller
{

    
    public function index(){
    
     return view ('admin.categories.index',
     
     ['categories' => Category::all()],
     ['newsList' => News::query()->with('category')->paginate(3) 
     //$this->getNews()
 ]);
 }
 
 public function create(){
    
     return view ('admin.categories.create');
 }
        
    
}
