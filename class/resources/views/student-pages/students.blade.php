@extends('layouts/layout')

@section('content')
    <section class="student-table">
        <table class="table-data">
            <tr>
                <th>Matricule</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit/Delete</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student['matricule'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>
                        <button><a href="{{ route('student.edit', ['id' => $student['id']]) }}">Edit</a></button>
                        <button><a href="{{ route('student.delete', ['id' => $student['id']]) }}">Delete</a></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
