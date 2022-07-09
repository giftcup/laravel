@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 class="fw-bold fs-2" id="form-ttl">Signup</h1>
        <form  class="reg-form" action="{{ route('student.signup', ['matricule' => 'FE20A111']) }}" method="POST">
            @csrf
            <div class="mb-3  w-75">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" name="matricule">
            </div>
            <div class="mb-3  w-75">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3  w-75">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3  w-75">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
