@extends('layouts/layout')

@section('content')
    <main class="add-form">
        <section class="dept_ttl">
            <h1 id="form-ttl">Add Department</h1>
            <div id="underline"> </div>
        </section>
        <form action="{{  route('department.store')  }}" method="POST">
            @csrf
            <div class="form-elmt">
                <p>Department Name: </p>
                <input type="text" name="name">
            </div>
            <div class="form-elmt">
                <p>Department Code: </p>
                <input type="text" name="code">
            </div>
            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </main>
@endsection
