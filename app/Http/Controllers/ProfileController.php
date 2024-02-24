<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hsh;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('admin.profile',compact('user'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);
        $update=User::find($id);
        $update->name=$request['name'];
        $update->email=$request['email'];
        $update->save();
        return redirect('profile');
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $data = User::find($id);
        if (Hash::check($request->old_password, $data->password)) {
            $data->password = Hash::make($request->password);
            $data->save();
            return redirect(url('profile'));
        } else {
            return redirect(url('profile'));
        }
    } 
}
