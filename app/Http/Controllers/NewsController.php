<?php

namespace App\Http\Controllers;


//use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{

    
   public function index(){

/    return view ('news.index', 
    ['newsList' => News::query()->get()
    //->paginate(5)
]);
}

       
   
//    public function show($id) {
           
//         return view('news.show', ['news' => $this->getNews($id)
    
//         ]);
//     } 


public function show($id) {
           
    return view('news.show', ['news' => News::query()->find($id)

    ]);
} 


    // public function adminindex(){
   
    //     return view ('admin.adminnewsindex', ['newsList' => $this->getNews()]);
    // }

    // public function adminshow($id) {
           
    //     return view('admin.adminshowOneNew', ['news' => $this->getNews($id)
    
    //     ]);
    // } 
    


}

