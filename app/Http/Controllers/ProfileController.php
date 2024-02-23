<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request, string $id)
    {
        // if($request->hasFile('image')){
        //     $filename = $request->image->getClientOriginalName();
        //     $request->image->storeAs('images',$filename,'public');
        //     $user = User::find(auth()->id()); 
        //     $user->update(['image'=>$filename]);
        // }
        // return redirect()->back();
        $user = user::findOrFail($id);
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $user->image = $filename;
        }

        $user->name = $request->name;
        $user->lang = $request->lang;
        $user->save();
  
        return redirect()->route('profile')->with('success', 'profile updated successfully');
    }

}
