@extends('layouts/layout')

@section('content')
    <main class="page">
        <header class="page_header">
            <section class="dept_ttl">
                <h1>Students</h1>
                <div id="underline"> </div>
            </section>
            <ul class="sub-actions">
                <li class="sub-actions-li"><a href="{{ route('student.add') }}"> Add Student</a></li>
            </ul>
        </header>
        <section class="student-table">
            <table class="table-data">
                <tr>
                    <th>Matricule</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Edit/Delete</th>
                </tr>
                {{-- <td>{{ $students }}</td> --}}
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student['matricule'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['email'] }}</td>
                        <td>
                            @if ($student['deptCode'] == null) 
                                No Department
                            @else 
                                {{  $student['department']->deptName  }}
                            @endif
                        </td>
                        <td>
                            <button><a href="{{ route('student.edit', ['id' => $student['id']]) }}">Edit</a></button>
                            <button><a href="{{ route('student.delete', ['id' => $student['id']]) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
    </main>
@endsection
