<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name','user_id','global'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
