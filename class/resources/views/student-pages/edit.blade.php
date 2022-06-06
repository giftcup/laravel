@extends('layouts.layout')

@section('content')
    <main>
        <div class="add-form">
            <h1 id="form-ttl">Edit Student Info</h1>
            <form class="reg-form" action="{{ route('editStore', ['id' => $student['id']]) }}" method="POST">
                @csrf
                <div class="form-elmt">
                    <label>Name: </label>
                    <input type="text" name="name" value="{{ $student['name'] }}">
                </div>
                <div class="form-elmt">
                    <label>Email: </label>
                    <input type="email" name="email" value="{{ $student['email'] }}">
                </div>
                <div class="form-elmt">
                    <label>Matricule: </label>
                    <input type="text" name="matricule" value="{{ $student['matricule'] }}">
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
                    <button type="submit" class="submit">Edit</button>
                </div>
            </form>
        </div>
    </main>
@endsection
