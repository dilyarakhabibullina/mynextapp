<?php

namespace App\Http\Controllers;


//use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models;

class NewsController extends Controller
{

    
   public function index(){

//     $news= app(News::class);
// dd($news->getAll());

   
    return view ('news.index', ['newsList' => $news->getAll()]);
}

       
   
   public function show($id) {
           
        return view('news.show', ['news' => $this->getNews($id)
    
        ]);
    } 

    public function adminindex(){
   
        return view ('admin.adminnewsindex', ['newsList' => $this->getNews()]);
    }

    public function adminshow($id) {
           
        return view('admin.adminshowOneNew', ['news' => $this->getNews($id)
    
        ]);
    } 
    


}

