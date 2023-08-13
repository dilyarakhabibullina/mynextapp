<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\News;
use App\Models\News;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function showCategories(){
       // dd (Category::all());
    return view('categoriesindex', ['categories'=> Category::all()]);
    //['categories'=>$this->getCategories()]);
    }

    public function showNewsByCategory($cid){
        //return view('admin.news.index', ['newsList'=>$this->getNewsByCategory($cid)]);
//dd(['newsList' => News::all()]);
        //return view('admin.news.index', ['newsList' => News::all()]);
      //  return view('admin.news.index', ['newsList' => News::where('isPrivate', 1)->get()]);
        return view('admin.news.index', ['newsList' => News::where('category_id', $cid)->get()]);
    }
}
