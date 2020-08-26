<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $casts = [
        'options' => 'array',
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
