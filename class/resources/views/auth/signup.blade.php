@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <h1 class="fw-bold fs-2" id="form-ttl">Signup</h1>
        <form  class="reg-form" action="" method="POST">
            <div class="mb-3  w-75">
                <label for="fname" class="form-label">Name</label>
                <input type="text" class="form-control" id="fname"\>
            </div>
            <div class="mb-3  w-75">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="matricule"\>
            </div>
            <div class="mb-3  w-75">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email"\>
            </div>
            <div class="mb-3  w-75">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3  w-75">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
