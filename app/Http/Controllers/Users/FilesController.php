<?php

namespace App\Http\Controllers\Users;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function store(Request $request)
    {
        $files = $request->file('file');

    	$folderId = $request->folder_id;

        foreach($files as $file)
        {
            File::create([
            	'user_id'	   =>  Auth::user()->id,
                'folder_id'    =>  $folderId,
                'filename'     =>  $file->getClientOriginalName(),
                'path'         =>  $file->store('public/storage')
            ]);
        }

        return redirect()->action('Users\FoldersController@show', compact('folderId'));
    }

    public function show($id)
    {
        $download = File::findOrFail($id);
        return Storage::download($download->path, $download->filename);
    }
}
