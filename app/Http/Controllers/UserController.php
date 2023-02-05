<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function indexuser()
    {
        $user=User::all();
        return view('user.homee', ['user' =>  $user]);
    }

    public function profile($id)
    {
        $user=User::where('id',$id)->firstOrFail();
        return view('user.profile', ['user' =>  $user]);
    }
    public function edit($id)
    {
        $profile=User::where('id',$id)->firstOrFail();
        return view('user.edit_profile')->with('profile',$profile);
    }
    public function update(Request $request,$id)
    {
        $user=User::where('id',$id)->firstOrFail();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,

        ]);
        $user->save();

    
        $request->session()->flash('message','تم تعديل معلوماتك بنجاح');
        return redirect()->route('profile');
    }

}
