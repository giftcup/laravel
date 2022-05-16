@extends('layouts.header')

@section('content')
    <main id="signup-page">
        <header>
            <h1>Sign Up</h1>
            <p>Already have an account? <a href="">Log in</a></p>
        </header>
        <section>
            <form action="">
                <input type="email" placeholder="Email" name="email">
                <input type="text" placeholder="Username" name="username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password2" placeholder="Confirm Password">
                <button type="submit" name="submit">Submit</button>
            </form>
        </section>
    </main>
@endsection
