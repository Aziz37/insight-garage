<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\FoldersController;

class SubfoldersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        $parentId = $request->input('parent_id');
        $description = '';
        
        if($request->has('description'))
        {
            $description = $request->input('description');
        }

        $this->validate($request, [
            'name' = 'required|string'
        ]);

    	$subfolder = new Folder;

    	$subfolder->admin_id	=	Auth::user()->id;
    	$subfolder->parent_id	=	$parentId;
    	$subfolder->name   		=	$request->input('name');
        $subfolder->description =   $description;

    	$subfolder->save();

        session()->flash('message', 'Folder Created Successfully !');

    	return redirect()->action('Admin\FoldersController@show', compact('parentId'));
    }

    public function edit($id)
    {
    	$folder = Folder::findOrFail($id);

    	return view('admin.subfolders.edit', compact('folder'));
    }

    public function update($id, Request $request)
    {
        $description = '';
        
        if($request->has('description'))
        {
            $description = $request->input('description');
        }

        $this->validate($request, [
            'name' = 'required|string'
        ]);

        Folder::where('id', '=', $id)->update([
            'name'        => $request->input('name'),
            'description' => $description
        ]); 

        $folder = Folder::findOrFail($id);

        $parentId = $folder->parent_id;

        session()->flash('message', 'Folder Name Changed Successfully !');

    	return redirect()->action('Admin\FoldersController@show', compact('parentId'));
    }

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        $folder->delete();

        $parentId = $folder->parent_id;

        session()->flash('message', 'Folder Deleted Successfully !');

        return redirect()->action('Admin\FoldersController@show', compact('parentId'));
    }
}
