<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexadmin()
    {
        return view('admin.home');
    }
    public function users()
    {
        $users=User::paginate(6);
        return view('admin.dashboard', ['users' =>  $users]);
    }
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstorfail()->delete();
        echo ("User Record deleted successfully.");
        return redirect()->route('dashboard');

    }
    
}
