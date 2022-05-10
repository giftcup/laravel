@extends('layouts/layout')

@section('content')
    <div class="add-form">
        <h1 id="form-ttl">Add Student</h1>
        <form action="{{   route('student.store')  }}" method="POST">
            @csrf
            <div class="form-elmt">
                <p>Name: </p>
                <input type="text" name="name">
            </div>
            <div class="form-elmt">
                <p>Email: </p>
                <input type="email" name="email">
            </div>
            <div class="form-elmt">
                <p>Matricule: </p>
                <input type="text" name="matricule">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
