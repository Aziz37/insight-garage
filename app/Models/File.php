<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $guarded = [];
	
	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function folder()
    {
    	return $this->belongsTo(Folder::class);
    }
}
