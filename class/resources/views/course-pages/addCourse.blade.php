@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 id="form-ttl">Add Student</h1>
        <form class="reg-form" action="{{ route('course.store') }}" method="POST">
            @csrf
            <div class="form-elmt">
                <label for="departments">Department: </label>
                <select name="department" class="select_dpt">
                    @foreach ($departments as $department)
                        <option value="{{ $department }}"> {{ $department['deptName'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-elmt">
                <label for="courseName">Course Name: </label>
                <input type="text" name="courseName">
            </div>
            <div class="form-elmt">
                <label for="courseCode">Course Code: </label>
                <input type="text" name="courseCode">
            </div>
            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </main>
@endsection
