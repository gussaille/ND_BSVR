<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'response', 'question_id', 'survey_user_id'
    ];

    // An answer belongs to one question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    // An answer belongs to one surveyUser
    public function surveyUser()
    {
        return $this->belongsTo(SurveyUser::class);
    }
}
