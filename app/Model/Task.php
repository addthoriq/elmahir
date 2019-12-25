<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
	use SoftDeletes;

	protected $fillable = [
	    'course_id', 'title', 'description', 'start_periode', 'end_periode', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at'
    ];
    // protected $softDeletes = true;
    protected $dates = ['deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
	public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function answerTask()
    {
        return $this->hasMany(AnswerTask::class);
    }
}
