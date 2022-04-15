@extends('layouts.app')

@section('content')

    <h1>Class list from contoller</h1>

    <ul>
        @foreach($students as $student)
            <li> {{ $student['id'] }}
                 {{$student['name']}}
                 <a href="{{ route('studentDetails', ['id' => $student['id']] )}}">details</a>

                @if($student['score'] >= 50)
                    <span class="text-success">
                        Congratulations, you scored {{ $student['score'] }} which is a pass mark
                    </span>
                @else
                    <span class="text-danger">
                        Oops, you scored {{ $student['score'] }} which is a fail mark
                    </span>
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Static Class list</h2>
    <ol>
        <li>Acha Rha'ah  <a href="{{ route('studentDetails', ['id' => 1] )}}">details</a></li>
        <li>Edwin Bimela <a href="{{ route('studentDetails', ['id' => 2] ) }}">details</a></li>
        <li>Ngewung Sonia <a href="{{ route('studentDetails', ['id' => 3] ) }}">details</a></li>
        <li>Fongoh Martin <a href="{{ route('studentDetails', ['id' => 4] ) }}">details</a></li>
        <li>John Doe <a href="{{ route('studentDetails', ['id' => 5]) }}">details</a></li>
    </ol>

@endsection