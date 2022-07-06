@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 class="fw-bold fs-2" id="form-ttl">Add Student</h1>
        <form class="reg-form" action="{{ route('student.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-elmt">
                <label for="profile">Upload Profile Photo</label>
                <input type="file" name="profile" accept="image/png image/jpg image/jpeg">
            </div>
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
