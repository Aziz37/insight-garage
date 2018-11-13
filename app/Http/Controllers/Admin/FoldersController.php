<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
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
        return view('admin.folders.create', compact('users'));
    }

    public function store(Request $request)
    {
    	$folder_type = $request->input('folder_type');
        $description = '';

        if($request->has('description'))
        {
            $description = $request->input('description');
        }

        $this->validate($request, [
            'folder_type' = 'required',
            'name'        = 'required|string',
        ]);

        $folder = new Folder;

    	$folder->admin_id		=	Auth::user()->id;
    	$folder->parent_id		=	$folder_type;
    	$folder->name			=	$request->input('name');
        $folder->description    =   $description;

    	$folder->save();

        session()->flash('message', 'Folder Created Successfully !');

        if($folder_type == 1)
        {
            return redirect('/admin/insight-vault');
        }
        if($folder_type == 2)
        {
            return redirect('/admin/innovation-toolkit');
        }
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
        $description = '';

        if($request->has('description'))
        {
            $description = $request->input('description');
        }

        $this->validate($request, [
            'name' = 'required|string',
        ]);

    	Folder::where('id', '=', $id)->update([
    		'name'        => $request->input('name'),
            'description' => $description
    	]);

        $folder = Folder::findOrFail($id);

        session()->flash('message', 'Folder Name Changed Successfully !');

        if($folder->parent_id == 1)
        {
            return redirect('/admin/insight-vault');
        }
        if($folder->parent_id == 2)
        {
            return redirect('/admin/innovation-toolkit');
        }
    }

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        $folder->delete();
        $folder->files()->delete();

        session()->flash('message', 'Folder Deleted Successfully !');

        if($folder->parent_id == 1)
        {
            return redirect('/admin/insight-vault');
        }
        if($folder->parent_id == 2)
        {
            return redirect('/admin/innovation-toolkit');
        }
    }

     public function insight()
    {
        $folders = Folder::where('parent_id', '=', 1)
                         ->orderBy('name')
                         ->get();

        $parent = Folder::findOrFail(1);

        return view('admin.folders.insight-vault', compact('folders', 'parent'));
    }

    public function innovation()
    {
        $folders = Folder::where('parent_id', '=', 2)
                         ->orderBy('name')
                         ->get();

        $parent = Folder::findOrFail(2);

        return view('admin.folders.innovation-toolkit', compact('folders', 'parent'));
    }

}
