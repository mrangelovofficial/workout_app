@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Exercise') }} </div>

                    <div class="card-body">
                        <form action="{{route('routine.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exercises">Exercise</label>
                                <select class="form-control" name="exercise" id="exercises">
                                    @foreach($exercises as $exercise)
                                        <option value="{{$exercise->id}}">{{$exercise->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sets">Default sets</label>
                                <input type="text" name="sets" value="{{ old('sets') }}" class="form-control @error('sets') is-invalid @enderror" id="sets" placeholder="Enter sets">
                                @error('sets')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reps">Default reps</label>
                                <input type="text" name="reps" value="{{ old('reps') }}" class="form-control @error('reps') is-invalid @enderror" id="reps" placeholder="Enter reps">
                                @error('reps')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reps">Exercise Order</label>
                                <input type="text" name="exercise_order" value="{{ old('exercise_order') }}" class="form-control @error('exercise_order') is-invalid @enderror" id="exercise_order" placeholder="Enter exercise order">
                                @error('exercise_order')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Log</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
