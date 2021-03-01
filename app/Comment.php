<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ["id"];
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
