@extends('layouts.layout')

@section('content')
    <section class="welcome">
        <div id="title">
            <h1>An Easier Way to Interact With Your Students</h1>
        </div>
        <div id="btn-nav">
            <button><a href="{{ route('students') }}">Registered Students</a></button>
            <button><a href="{{ route('students.add') }}">Add Students</a></button>
        </div>
    </section>
@endsection