<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Access;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FoldersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
    {
    	$folders = Folder::where('id', '>', 1)
                         ->where('parent_id', '=', 0)
                         ->orderBy('name')
                         ->get();
    	
    	return view('admin.folders.index', compact('folders'));
    }

    public function create()
    {
        $users = User::get();

    	return view('admin.folders.create', compact('users'));
    }

    public function store(Request $request)
    {
    	$parentId = 0;

    	if($request->has('parent_id'))
    	{
    		$parentId = $request->input('parent_id');
    	}
        
        $folder = new Folder;

    	$folder->admin_id		=	Auth::user()->id;
    	$folder->parent_id		=	$parentId;
    	$folder->name			=	$request->input('name');

    	$folder->save();

        session()->flash('message', 'Folder Created Successfully !');

    	return redirect('/admin/folders');
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);

        $subfolders = Folder::where('parent_id', '=', $id)->get();
    
    	return view('admin.folders.show', compact('folder', 'subfolders'));
    }

    public function edit($id)
    {
    	$folder = Folder::findOrFail($id);

    	return view('admin.folders.edit', compact('folder'));
    }

    public function update($id, Request $request)
    {
    	Folder::where('id', '=', $id)->update([
    		'name' => $request->input('name')
    	]);	

        session()->flash('message', 'Folder Name Changed Successfully !');

    	return redirect('/admin/folders');
    }

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        $folder->delete();
        $folder->files()->delete();
        
        session()->flash('message', 'Folder Deleted Successfully !');

        return redirect('/admin/folders');
    }

}
