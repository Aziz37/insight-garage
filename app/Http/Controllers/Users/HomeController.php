<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.home');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.profile', compact('user'));
    }

    public function update($id, Request $request)
    {
        if($request->has('password'))
        {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed'
            ]);

            User::where('id', '=', $id)->update([
                'password' => Hash::make($request->input('password'))
            ]);

            session()->flash('message', 'Password Changed Successfully !');

            return redirect()->action('Auth\LoginController@userLogout');
        }

        $this->validate($request, [
            'email'     =>  'required'
        ]);
        
        User::where('id', $id)->update([
            'email'     =>  $request->input('email')
        ]);

        session()->flash('message', 'User Details Changed Successfully !');

        return $this->edit($id);
    }
}
