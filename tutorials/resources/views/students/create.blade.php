@extends('layouts.app')

@section('content')

    <h1>Creating Student</h1>

    <div class="p-5 bg-dark">
        <form class="bg-white p-4" action="{{ route('students.store') }}" method="post">
            @csrf
            <div class="form-group mb-4">
                <label for="">Name</label>
                <input class="form-control" name="name" type="text"/>
            </div>
            <div class="form-group mb-4">
                <label for="">Score</label>
                <input class="form-control" name="score" type="number"/>
            </div>
            <div class="form-group mb-4">
                <button class="btn btn-primary" type="submit"> Submit </button>
            </div>
        </form>
    </div>
    
@endsection