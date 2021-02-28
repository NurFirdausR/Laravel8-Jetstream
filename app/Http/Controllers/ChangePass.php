<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePass extends Controller
{
    //

    public function ChangePassword()
    {
        return view('admin.body.change_password');
    }

    public function PasswordUpdate(Request $request)
    {
            $validate = $request->validate([
                'oldpassword' => 'required',
                'password'=> 'required|confirmed'
            ]);
                $hashedPassword = Auth::user()->password;
                if (Hash::check($request->oldpassword,$hashedPassword)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Auth::logout();
                    return redirect()->route('login')->with('success', 'Password Berhsail di Ubah');
                }else{
                    return redirect()->back()->with('error', 'Password Gagal di Ubah');
                    
                }
        }

        public function ProfileEdit()
        {
            if (Auth::user()) {
                $user = User::find(Auth::user()->id);
                if ($user) {
                    return view('admin.body.update_profile',compact('user'));
                }
            }
        }

        public function ProfileUpdate(Request $request)
        {
            $user = User::find(Auth::user()->id);
            if ($user) {
                $user->name = $request['name'];
                $user->email = $request['email'];

                $user->save();
                return Redirect()->back()->with('success','User profile berhasil di update');
            }else{
                return Redirect()->back()->with('error','User profile Gagal! di update');
            }
        }

}
