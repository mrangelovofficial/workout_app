@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Today Routine') }} </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Exercise Name</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Sets</th>
                                <th scope="col">Reps</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$log->routine->exercise->name}}</td>
                                <td>{{$log->routine->exercise->picture}}</td>
                                <td>{{$log->sets}}({{$log->routine->sets}})</td>
                                <td>{{$log->reps}} ({{$log->routine->reps}})</td>
                                <td>{{$log->weight}} </td>
                                <td><form action="{{ route('log.destroy', $log->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
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
