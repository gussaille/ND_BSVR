<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question()
    {
        return $this->ManyToMany(Question::class);
    }
    
    public function user(){
        return $this->ManyToMany(User::class);
    }
}
