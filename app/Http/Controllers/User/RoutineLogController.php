<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoutineLog\UpdateRequest;
use App\RoutineLog;
use App\Routine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoutineLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = RoutineLog::with('routine','routine.exercise')->whereDate('created_at', Carbon::today())->get();
        return view('user.routine-log.index',['logs'=>$logs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $routine = Routine::findorFail($id);
        $day     = Carbon::today()->format('d M');
        return view('user.routine-log.edit',['routine'=>$routine,'today'=>$day]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $routine = Routine::findorFail($id);

        $routine->routine_logs()->create([
            'user_id'   => $routine->user_id,
            'weight'    => $request->weight,
            'reps'    => $request->reps,
            'sets'    => $request->sets,
        ]);
        return redirect()->route('routine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $routineLog = RoutineLog::findOrFail($id);
        $routineLog->delete();
        return redirect()->route('log.index');

    }
}
