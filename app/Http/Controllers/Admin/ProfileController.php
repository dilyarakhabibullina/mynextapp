<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.profile', 
        ['users' => User::query()->get()
        //->paginate(7), 
        //$this->getNews()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        return view('admin.profile', ['users'=>$users]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        // public function update (Request $request, User $users) {
        //dd($request->all());
        $data = $request->all();
        dd($data);

        $users = $users->fill($request->all());
        if ($users->save()){
            return redirect()->route('admin.news.profile')->with('success', __('Profile was updated successfully'));
            }
        return back()->with('error', __('We cannot save item'));
    }


    // //dd($request->all());
        // $data = $request->validated();
        // dd($data);
    //     $news = $news->fill($request->validated());
    //     if ($news->save()){
    //         return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
    //         }
    //     return back()->with('error', __('We cannot save item'));
    // }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
