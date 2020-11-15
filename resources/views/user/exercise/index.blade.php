@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                {{ __('Exercises') }}
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-primary" href="{{route('exercise.create')}}">Create exercise</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exercises as $exercise)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$exercise->name}}</td>
                                <td>{{$exercise->picture}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('exercise.edit',$exercise->id)}}" class="btn btn-small mr-2 btn-success">Edit</a>
                                        <form action="{{ route('exercise.destroy', $exercise->id) }}" method="POST">
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
