<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Survey has many surveyUser 
    public function surveyUser()
    {
        return $this->hasMany(SurveyUser::class);
    }

    // A Survey has many questions 
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
