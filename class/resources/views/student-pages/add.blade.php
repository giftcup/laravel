@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 id="form-ttl">Add Student</h1>
        <form class="reg-form" action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class="form-elmt">
                <label for="name">Name: </label>
                <input type="text" name="name">
            </div>
            <div class="form-elmt">
                <label for="email">Email: </label>
                <input type="email" name="email">
            </div>
            <div class="form-elmt">
                <label for="matricule">Matricule: </label>
                <input type="text" name="matricule">
            </div>
            <div class="form-elmt">
                <label for="departments">Department: </label>
                <select name="department" class="select_dpt">
                    <option value="{{ null }}">-Select Department-</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department }}"> {{ $department['deptName'] }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </main>
@endsection
