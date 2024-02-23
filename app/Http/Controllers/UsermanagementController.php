<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsermanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::orderBy('created_at', 'DESC')->get();
  
        return view('users.index', compact('user'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();
        user::create($request->all());
 
        return redirect()->route('users')->with('success', 'user added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::findOrFail($id);
  
        return view('users.show', compact('user'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user::findOrFail($id);
  
        return view('users.edit', compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = user::findOrFail($id);
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $user->image = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->lang = $request->lang;
        $user->save();
  
        return redirect()->route('users')->with('success', 'user updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::findOrFail($id);
  
        $user->delete();
  
        return redirect()->route('users')->with('success', 'user deleted successfully');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
               
        return back();
    }
}
