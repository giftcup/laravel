@extends('layouts.layout')

@section('content')
    <main class="welcome">
        <div id="title">
            <h1>An Easier Way to Interact With Your Students</h1>
        </div>
        <div id="btn-nav">
            <button><a href="{{ route('students') }}">Registered Students</a></button>
            <button><a href="{{ route('student.add') }}">Add Students</a></button>
        </div>
    </main>
@endsection