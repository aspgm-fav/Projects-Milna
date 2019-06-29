<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
use App\Category;
use Auth;
use App\Product;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ringks(){
        $category = Category::all();
        return view('users.ringkasan',compact('category'));
    }
    public function auth()
    {
        $category = Category::all();
        return view('auth.verify', compact('category'));
    }
    public function index()
    {
        $category = Category::all();
        return view('users.ringkasan',compact('category'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $user = User::findOrFail($id);
        return view('users.editprofile', compact('user','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->sub_district = $request->get('sub_district');
        $user->city = $request->get('city');
        $user->province = $request->get('province');
        $user->zip_code = $request->get('zip_code');
        $user->phone = $request->get('phone');
        if($request->file('image')){
            if($user->image && file_exists(storage_path('app/public/' . $user->image))){
                \Storage::delete('public/' . $user->name);
            }
            $new_image = $request->file('image')->store('avatars', 'public');    
            $user->image = $new_image;
        }

        $user->save();
        return redirect()->route('user.index', ['id' => $id])->with('success', Auth::user()->username. ' profil kamu baru saja diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
