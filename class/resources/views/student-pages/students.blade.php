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
        <section>
            <form action="{{ route('students') }}" class="sort_search" method="GET">
                <div class="form-elmt">
                    <label for="order_by">Order By: </label>
                    <select name="order_by" class="select">
                        <option value="name">Student Name</option>
                        <option value="matricule">Matricule</option>
                        <option value="department_id">Department</option>
                        <option value="created_at">Created Time</option>
                    </select>
                </div>
                <div class="form-elmt">
                    <label for="order">Order</label>
                    <select name="order" class="select">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>
                <button class="btn">Order</button>
            </form>
        </section>
        <section class="student-table">
            <table class="table-data">
                <tr>
                    <th>Matricule</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Edit/Delete</th>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student['matricule'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['email'] }}</td>
                        <td>
                            @if ($student['department'] == null)
                                No Department
                            @else
                                {{ $student['department'] }}
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
