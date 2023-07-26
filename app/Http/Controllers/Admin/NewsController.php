<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
 



class NewsController extends Controller
{

    
   public function index(){
   
    return view ('admin.news.index', 
    ['newsList' => News::all()
    //$this->getNews()
]);
}

public function create(){
   $categories = Category::all();



    return view ('admin.news.create', [
        'categories'=>$categories
    ]);
}
       
   
   public function show($id) {
           
        return view('news.show', ['news' => $this->getNews($id)
    
        ]);
    } 

    public function store(Request $request) {
          $request->validate([
'title' => 'required',
          ]);
      //  dd($_REQUEST);
          
    } 

    public function adminindex(){
   
        return view ('admin.adminnewsindex', ['newsList' => $this->getNews()]);
    }

    public function adminshow($id) {
           
        return view('admin.adminshowOneNew', ['news' => $this->getNews($id)
    
        ]);
    } 
    


}

