@extends('layouts.layout')

@section('content')
    <main class="departments">
        <header class="dept_header">
            <section class="dept_ttl">
                <h1>Departments</h1>
                <div id="underline"> </div>
            </section>
            <ul class="sub-actions">
                <li class="sub-actions-li"><a href="{{  route('department.add')  }}"> Add Department</a></li>
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
                <tr>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Student</td>
                    <td><a href=""><button>Edit</button></a>
                        <a href=""><button>Delete</button></a>
                    </td>
                </tr>
            </table>

        </section>
    </main>
@endsection
