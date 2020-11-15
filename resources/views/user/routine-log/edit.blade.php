@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Log for') }} {{$today}}</div>

                    <div class="card-body">
                        <form action="{{route('log.update',$routine->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="weight">Exercise</label>
                                <input type="text" readonly class="form-control" id="exercise" value="{{$routine->exercise->name}}">
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" name="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror" id="weight" placeholder="Enter weight">
                                  @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                            <div class="form-group">
                                <label for="sets">Sets</label>
                                <input type="text" name="sets" value="{{ old('sets') }}" class="form-control @error('sets') is-invalid @enderror" id="sets" placeholder="Enter sets">
                                @error('sets')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reps">Reps</label>
                                <input type="text" name="reps" value="{{ old('reps') }}" class="form-control @error('reps') is-invalid @enderror" id="reps" placeholder="Enter reps">
                                @error('reps')
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
