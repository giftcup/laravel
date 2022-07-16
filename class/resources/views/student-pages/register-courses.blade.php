@extends('layouts.layout')

@section('content')
    <h1>Register Courses</h1>
    <main>
        <form class="reg-form" action="{{ route('student.courses', ['id' => 22]) }}" method="POST">
            @csrf
            @foreach ($courses as $course)
                <div>
                    <input type="checkbox" value="{{ $course['id'] }}" name="course[]">
                    <label for="course[]">{{ $course['courseName'] }}</label>
                </div>
            @endforeach
            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </main>
@endsection