<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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

        $users = User::all();
       // dd($users);
       foreach($users as $user){
       // dd([$request->input($user['name'])]); 
        // dd($user->isAdmin);
        //dd($request->input('ivan@rambler.ru')); 
           $user->isAdmin = $request->input($user['name']);
          //  $user->fill([$request->all()]); 
       // $user->isAdmin = 1;
        //$request->input('isAdmin');
        $user->save();
        
        }
        return redirect()->route('admin.profile.update')->with('success', __('Roles were saved successfully'));
     
       // dd($user);
        // public function update (Request $request, User $users) {
        //dd($request->all());
    //    $data = $request;
    //    dd($data);
      // DB::table('users')->update(['isAdmin' => $request->input('isAdmin')]);
      
    //     if ($users->save()){
    //         return redirect()->route('admin.news.profile')->with('success', __('Profile was updated successfully'));
    //         }
    //     return back()->with('error', __('We cannot save item'));
    


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
   
}
}