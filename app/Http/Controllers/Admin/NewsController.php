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
    ['newsList' => News::query()->with('category')->paginate(7), 
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
           
        return view('news.show', ['news' => News::query()->find($id)
    
        ]);
    } 

    public function store(Request $request) {
          $request->validate([
'title' => 'required',
          ]);
     

     $data = $request->only(['category_id', 'title', 'text','author', 'isPrivate']);
          
          $news = new News($data);
          if ($news->save()){
          return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
          }
          return back()->with('error', 'Не удалось добавить запись');
//dump($_REQUEST);
    } 

    public function edit(News $news){
$categories = Category::all();
//$news = News::all();

return view('admin.news.edit', ['categories'=>$categories, 'news'=>$news]);
    }

    public function update (Request $request, News $news) {
        $data = $request->only(['category_id', 'title', 'text','author', 'isPrivate']);
        $news = $news->fill($data);
        if ($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
            }
        return back()->with('error', 'Не удалось обновить запись');




    }

    public function adminindex(){
   
        return view ('admin.adminnewsindex', ['newsList' => $this->getNews()]);
    }

    public function adminshow($id) {
           
        return view('admin.adminshowOneNew', ['news' => $this->getNews($id)
    
        ]);
    } 
    


}

