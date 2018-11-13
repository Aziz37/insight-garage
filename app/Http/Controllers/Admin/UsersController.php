<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
    {
        $users = User::get();

        return view('admin.users.index', compact('users'));    
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|string|max:255',
            'email'     =>  'required|string|email|max:255|unique:users',
            'password'  =>  'required|string|min:6|confirmed',
            'user_type' =>	'required',
        ]);

        $user = new User;

        $user->name         =   $request->input('name');
        $user->user_type    =   $request->input('user_type');
        $user->email        =   $request->input('email');
        $user->password     =   Hash::make($request->input('password'));

        $user->save();

        session()->flash('message', 'User Created Successfully !');

        return redirect('/admin/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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

            return redirect('/admin/users');
        }

        $this->validate($request, [
            'user_type' =>  'required',
            'email'     =>  'required'
        ]);
        
        User::where('id', $id)->update([
            'user_type' =>  $request->input('user_type'),
            'email'     =>  $request->input('email')
        ]);

        session()->flash('message', 'User Details Changed Successfully !');

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        session()->flash('message', 'User Deleted Successfully !');

        return redirect('/admin/users');
    }
}
