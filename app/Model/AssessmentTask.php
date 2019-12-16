<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssessmentTask extends Model
{
	protected $fillable     = [
        'score'
    ];

    public function answerTask()
    {
        return $this->belongsTo(AnswerTask::class);
    }
}
