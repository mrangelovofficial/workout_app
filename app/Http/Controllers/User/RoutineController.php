<?php

namespace App\Http\Controllers\User;

use App\Exercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\Routine\StoreRequest;
use App\Routine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $day     = $this->getToday($dayOfTheWeek);
        $routines = Routine::with('exercise')->where('day_of_week',$day->id)->get();

        return view('user.routine.index', [
            'day' => $day,
            'routines'   => $routines
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dayOfWeek = $this->getToday();
        $exercises = Exercise::where('user_id',auth()->user()->id)->orWhere('global', '1')->get();
        return view('user.routine.create',[
            'exercises'  =>  $exercises,
            'dayOfWeek'  =>  $dayOfWeek,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $exercise = Exercise::findOrFail($request->exercise);
        Routine::create([
            'sets'              =>  $request->sets,
            'reps'              =>  $request->reps,
            'user_id'           =>  auth()->user()->id,
            'exercise_id'       =>  $exercise->id,
            'day_of_week'       =>  $request->day_of_week,
            'exercise_order'    =>  $request->exercise_order
        ]);

        return redirect()->route('routine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return redirect()->route('routine.index');
    }

    private function getToday($dayOfTheWeek = null)
    {
        $weekMap = [
            1 => ['name' => 'Monday','id' => 0],
            2 => ['name' => 'Tuesday','id' => 1],
            3 => ['name' => 'Wednesday','id' => 2],
            4 => ['name' => 'Thursday','id' => 3],
            5 => ['name' => 'Friday','id' => 4],
            6 => ['name' => 'Saturday','id' => 5],
            0 => ['name' => 'Sunday','id' => 6],
        ];
        if(is_null($dayOfTheWeek)){
            return (object)$weekMap;
        }
        return (object)$weekMap[$dayOfTheWeek];
    }
}
