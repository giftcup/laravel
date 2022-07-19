@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 class="fw-bold fs-2" id="form-ttl">Signup</h1>
        <form  class="reg-form" action="{{ route('student.signup') }}" method="POST">
            @csrf
            <div class="mb-3  w-75">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" name="matricule">
            </div>
            <div class="mb-3  w-75">
                <label for="verification_code" class="form-label">Verification Code</label>
                <input type="text" class="form-control" name="verification_code">
            </div>
            <div class="mb-3  w-75">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3  w-75">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
