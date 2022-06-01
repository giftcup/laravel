@extends('layouts/header')

@section('content')
<main id="signup-page">
    <header>
        <h1>Sign Up</h1>
        <p>Already have an account? <a href="">Log in</a></p>
    </header>
    <section>
        <form action="">
            @csrf
            <input type="email" placeholder="Email" name="email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Submit</button>
        </form>
    </section>
</main>
@endsection