@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                {{$day->name}} {{ __('Routine') }}
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-primary" href="{{route('routine.create')}}">Add exercise</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Exercise Name</th>
                                {{-- <th scope="col">Picture</th> --}}
                                <th scope="col">Sets</th>
                                <th scope="col">Reps</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($routines as $routine)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$routine->exercise->name}}</td>
                                {{-- <td>{{$routine->exercise->picture}}</td> --}}
                                <td>{{$routine->sets}}</td>
                                <td>{{$routine->reps}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('log.edit',$routine->id)}}" class="btn btn-small mr-2 btn-success">Log</a>
                                        <form action="{{ route('routine.destroy', $routine->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">X</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
