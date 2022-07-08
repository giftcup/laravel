@extends('layouts.layout')

@section('content')
    <main>
        <div class="add-form">
            <h1 id="form-ttl">Edit Student Info</h1>
            @if ($student['image_path'] == null)
                <img class="prof_img" src="{{  asset('images/default.jpg')  }}" alt="">
            @else
                <img class="prof_img" src="{{ asset('images/'. $student['image_path']) }}" alt="image">
            @endif
            <form class="reg-form" action="{{ route('student.edited', ['id' => $student['id']]) }}" method="POST">
                @csrf
                <div class="form-elmt">
                    <label>Name: </label>
                    <input type="text" name="name" value="{{ $student['name'] }}">
                </div>
                <div class="form-elmt">
                    <label>Email: </label>
                    <input type="email" name="email" value="{{ $student['email'] }}">
                </div>
                <div class="form-elmt">
                    <label>Matricule: </label>
                    <input type="text" name="matricule" value="{{ $student['matricule'] }}">
                </div>
                <div class="form-elmt">
                    <label for="departments">Department: </label>
                    <select name="department" class="select_dpt">
                        @if ($studentDept == null)
                            <option selected="selected" value="{{ null }}">No Department</option>
                        @endif
                        @foreach ($departments as $department)
                            @if ($studentDept !== null && $department['id'] == $studentDept['id'])
                                <option selected="selected" value="{{ $department }}">
                                @else
                                <option value="{{ $department }}">
                            @endif
                            {{ $department['deptName'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="submit">Edit</button>
                </div>
            </form>
        </div>
    </main>
@endsection
