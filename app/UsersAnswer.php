<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAnswer extends Model
{
    protected $fillable = ['response', 'user_id', 'answer_id'];

    public function User()
    {
        return $this->BelongsTo(User::class);
    }
    public function Question()
    {
        return $this->belongsTo(Question::class);
    }

}
