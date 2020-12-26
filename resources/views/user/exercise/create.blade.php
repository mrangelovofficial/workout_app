@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Exercise') }} </div>

                    <div class="card-body">
                        <form action="{{route('exercise.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Exercise Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if(auth()->user()->isAdmin)
                            <div class="form-group">
                                <label for="name">For whom to show the exercise</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="global" id="forUser" value="" checked>
                                    <label class="form-check-label" for="forUser">
                                        User
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="global" id="global" value="true">
                                    <label class="form-check-label" for="global">
                                        Global
                                    </label>
                                  </div>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
