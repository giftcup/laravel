<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schule</title>
    <link rel="stylesheet" href="/styles/layout.css">
</head>

<body>
    <nav>
        <div class="logo">
            <a href="{{ route('home') }}">
                <h1>Schule</h1>
            </a>
        </div>
        <ul class="nav-list">
            <li><a href="{{ route('students') }}">Class List</a></li>
            <li><a href="{{ route('student.add') }}">Add Student</a></li>
        </ul>
    </nav>


    @yield('content')
    
</body>

</html>
