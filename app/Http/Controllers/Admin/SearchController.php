<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\User;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
    	$query = $request->input('search');

    	$folderResults = Folder::where('name', 'LIKE', '%'.$query.'%')
    							->where('id', '>', 1)
    							->get();
    	
    	$fileResults = File::where('filename', 'LIKE', '%'.$query.'%')
    						->get();

    	$userResults = User::where('name', 'LIKE', '%'.$query.'%')
    						->orWhere('email', 'LIKE', '%'.$query.'%')
                            ->orWhere('department', 'LIKE', '%'.$query.'%')
    						->orderBy('name')
    						->get();

    	return view('admin.results', compact(
    		'folderResults', 
    		'fileResults', 
    		'userResults', 
    		'query'
    	));
    }
}
