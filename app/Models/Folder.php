<?php

namespace App\Models;

use App\Models\File;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function files()
    {
    	return $this->hasMany(File::class);
    }
}
