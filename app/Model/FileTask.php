<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileTask extends Model
{
	protected $fillable = [
	    'task_id', 'name_file', 'type_file', 'link', 'created_at', 'updated_at'
	];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
