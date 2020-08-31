<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'response', 'question_id'
    ];

    public function question(){

        return $this->belongsTo(Question::class);
    }

    public function survey()
    {

        return $this->belongsTo(Survey::class);
    }
}
