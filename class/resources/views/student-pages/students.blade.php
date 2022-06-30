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
        <section class="sort_search">
            @php
                $options = [
                    'name' => 'Student Name',
                    'matricule' => 'Matricule',
                    'departments.deptName' => 'Department Name',
                    'created_at' => 'Created At',
                ];
            @endphp

            <form action="{{ route('students') }}" class="sort" method="GET">
                <div class="form-elmt">
                    <label for="order_by">Order By: </label>
                    <select name="order_by" class="select">
                        @foreach ($options as $option => $name)
                            <option value={{ $option }} {{ $option == $order_by ? 'selected' : ' ' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-elmt">
                    <label for="order">Order</label>
                    <select name="order" class="select">
                        @foreach (['ASC' => 'Ascending', 'DESC' => 'Descending'] as $key => $value)
                            <option value={{ $key }} {{ $key == $order ? 'selected' : ' ' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-elmt">
                    <input id="search_input" type="text" name="search"
                        {{ $search != null ? 'value =' . $search : 'placeholder =' . 'Search' }}>
                </div>
                <button type="submit" class="btn">Search</button>
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
                                {{ $student->department->deptName }}
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
        </section>
    </main>
@endsection
