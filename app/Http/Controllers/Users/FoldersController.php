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

	public function index()
    {
    	$folders = Folder::where('id', '>', 1)
                         ->where('parent_id', '=', 0)
                         ->orderBy('name')
                         ->paginate(10);
    	
    	return view('users.folders.index', compact('folders'));
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);

        $subfolders = Folder::where('parent_id', '=', $id)->get();
    
    	return view('users.folders.show', compact('folder', 'subfolders'));
    }
}
