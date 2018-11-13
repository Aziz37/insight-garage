<?php

namespace App\Http\Controllers\Users;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function store(Request $request)
    {
    	$query = $request->input('search');

    	$folderResults = Folder::where('name', 'LIKE', '%'.$query.'%')
                                ->where('id', '>', 1)
                                ->orderBy('name')
                                ->get();
        
        $fileResults = File::where('filename', 'LIKE', '%'.$query.'%')
                            ->orderBy('filename')
                            ->get();


        return view('users.results', compact('folderResults', 'fileResults', 'query'));
    }
}
