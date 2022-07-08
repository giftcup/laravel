@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <section class="dept_ttl">
            <h1 id="form-ttl">Edit Department</h1>
            <div id="underline"> </div>
        </section>
        <form class="reg-form" action="{{ route('department.edited', ['id' => $dpt['id']]) }}" method="POST">
            @csrf
            <div class="form-elmt">
                <p>Department Name: </p>
                <input type="text" name="name" value="{{ $dpt['deptName'] }}">
            </div>
            <div class="form-elmt">
                <p>Department Code: </p>
                <input type="text" name="code" value="{{ $dpt['deptCode'] }}">
            </div>
            <div>
                <button type="submit" class="submit">Edit</button>
            </div>
        </form>
    </main>
@endsection
