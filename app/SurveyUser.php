<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    protected $table = 'survey_user';

    protected $fillable = [
        'user_id', 'survey_id'
    ];

    // A SurveyUser belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A surveyUser belongs to one Survey
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    // A surveyUser has many answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
