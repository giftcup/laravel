<h5>Hello {{ $name }}, </h5>

<section>
    <p>You've been accepted to Schule</p>
    <p>Please create your account <a href="{{ route('signup') }}}">here</a>. You're matricule is <b>{{ $matricule }}</b></p>
    <p>Check out your account details <a href="{{ route('student.edit', ['id' => $studId]) }}">here</a></p>
</section>
