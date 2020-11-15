<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RoutineLog extends Model
{
    protected $fillable = ['weight','sets','reps','user_id'];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('authUser',function (Builder $builder) {
            $builder->where('user_id',auth()->user()->id);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function routine(){
        return $this->belongsTo(Routine::class);
    }
}
