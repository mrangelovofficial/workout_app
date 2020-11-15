<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = ['sets','reps','user_id','exercise_id','day_of_week','exercise_order'];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('authUser',function (Builder $builder) {
            $builder->where('user_id',auth()->user()->id);
        });
        static::addGlobalScope('orderByExercise',function (Builder $builder) {
        $builder->orderBy('exercise_order', 'ASC');
    });
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function routine_logs(){
        return $this->hasMany(RoutineLog::class);
    }
}
