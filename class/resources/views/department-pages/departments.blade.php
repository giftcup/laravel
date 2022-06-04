@extends('layouts.layout')

@section('content')
    <main class="page">
        <header class="page_header">
            <section class="dept_ttl">
                <h1>Departments</h1>
                <div id="underline"> </div>
            </section>
            <ul class="sub-actions">
                <li class="sub-actions-li"><a href="{{ route('department.add') }}"> Add Department</a></li>
            </ul>
        </header>
        <section class="dept_info">
            <table class="table-data">
                <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Students Registered</th>
                    <th>Edit/Delete</th>
                </tr>
                @foreach ($departs as $department)
                    <tr>
                        <td>{{ $department['deptCode'] }}</td>
                        <td>{{ $department['deptName'] }}</td>
                        <td>Student</td>
                        <td><a
                                href="{{ route('department.edit', ['id' => $department['id']]) }}"><button>Edit</button></a>
                            <a
                                href="{{ route('department.delete', ['id' => $department['id']]) }}"><button>Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </section>
    </main>
@endsection
