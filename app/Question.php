<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $casts = [
        'options' => 'array',
    ];

    // A Question has many answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
