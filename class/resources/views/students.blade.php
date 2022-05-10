@extends('layouts/layout')

@section('content')
    <section class="student-table">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Matricule</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student['matricule'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
