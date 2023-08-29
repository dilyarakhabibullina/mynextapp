<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', ['categories'=>Category::all()]);  //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //dd($request);   
    $categories = new Category([
        'categories' => request('categories'),
        'slug' => request('slug')
    ]);
        if ($categories->save()){
   // dd($categories);){
        return redirect()->route('admin.categories.index')->with('success', __('Category was saved successfully'));
          }
          return back()->with('error', __('We cannot save item'));
//dump($_REQUEST);
    } 

       
       
        //
    

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return response()->json('ok');
    }
}
