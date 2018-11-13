<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
    public function store(Request $request)
    {
        $files = $request->file('file');

    	$folderId = $request->folder_id;

        foreach($files as $file)
        {
            File::create([
            	'admin_id'	   =>  Auth::user()->id,
                'folder_id'    =>  $folderId,
                'filename'     =>  $file->getClientOriginalName(),
                'path'         =>  $file->store('public/storage')
            ]);
        }

        session()->flash('message', 'File Uploaded Successfully !');

        return redirect()->action('Admin\FoldersController@show', compact('folderId'));
    }

    public function show($id)
    {
        $download = File::findOrFail($id);
        return Storage::download($download->path, $download->filename);
    }

    public function destroy($id)
    {
    	$file = File::findOrFail($id);

    	$folderId = $file->folder_id;

    	Storage::delete($file->path);
    	$file->delete();

        session()->flash('message', 'File Deleted Successfully !');
        
    	return redirect()->action('Admin\FoldersController@show', compact('folderId'));
    }
}
