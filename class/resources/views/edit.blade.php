@extends('layouts.layout')

@section('content')
    <section>
        <div class="add-form">
            <h1 id="form-ttl">Edit Student Info</h1>
            <form action="{{ route('editStore', ['id' => $student['id']]) }}" method="POST">
                @csrf
                <div class="form-elmt">
                    <p>Name: </p>
                    <input type="text" name="name" value="{{ $student['name'] }}">
                </div>
                <div class="form-elmt">
                    <p>Email: </p>
                    <input type="email" name="email" value="{{ $student['email'] }}">
                </div>
                <div class="form-elmt">
                    <p>Matricule: </p>
                    <input type="text" name="matricule" value="{{ $student['matricule'] }}">
                </div>
                <div>
                    <button type="submit">Edit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
