<?php

namespace App\Http\Controllers\Users;

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
        $this->middleware('auth');
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);

        $subfolders = Folder::where('parent_id', '=', $id)->get();
    
    	return view('users.folders.show', compact('folder', 'subfolders'));
    }

    public function insight()
    {
        $folders = Folder::where('parent_id', '=', 1)
                         ->orderBy('name')
                         ->paginate(10);

        $parent = Folder::findOrFail(1);

        return view('users.folders.index', compact('folders', 'parent'));
    }

    public function innovation()
    {
        $folders = Folder::where('parent_id', '=', 2)
                         ->orderBy('name')
                         ->paginate(10);

        $parent = Folder::findOrFail(2);

        return view('users.folders.index', compact('folders', 'parent'));
    }
}
