<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surveyUser()
    {
        return $this->hasMany(SurveyUser::class);
    }
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
