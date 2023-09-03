<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
 



class NewsController extends Controller
{

    
   public function index(){
   

   
    return view ('admin.news.index', 
    ['newsList' => News::query()->with('category')->get()
    //->paginate(7), 
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

    public function store(Create $request) {
//           $request->validate([
// 'title' => 'required',
//           ]);
     

    // $data = $request->only(['category_id', 'title', 'text','author', 'isPrivate']);
          
          $news = new News($request->validated());
          if ($news->save()){
          return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
          }
          return back()->with('error', __('We cannot save item'));
//dump($_REQUEST);
    } 

    public function edit(News $news){
$categories = Category::all();
//$news = News::all();

return view('admin.news.edit', ['categories'=>$categories, 'news'=>$news]);
    }

    public function update (Edit $request, News $news) {
        //dd($request->all());
        // $data = $request->validated();
        // dd($data);
        $news = $news->fill($request->validated());
        if ($news->save()){
            return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
            }
        return back()->with('error', __('We cannot save item'));
    }


    public function destroy (News $news) {
        try
        {
            $news->delete();
           return response()->json('ok');
        } catch (Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }

    // public function adminindex(){
   
    //     return view ('admin.adminnewsindex', ['newsList' => $this->getNews()]);
    // }

    // public function adminshow($id) {
           
    //     return view('admin.adminshowOneNew', ['news' => $this->getNews($id)
    
    //     ]);
    // } 
    


}

