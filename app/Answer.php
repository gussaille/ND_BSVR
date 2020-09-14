<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'response', 'question_id', 'survey_user_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function surveyUser()
    {
        return $this->belongsTo(SurveyUser::class);
    }
}
