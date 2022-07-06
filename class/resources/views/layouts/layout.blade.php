<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/layout.css">
</head>

<body>
    
    <nav class="navbar sticky-top">
        <div class="logo">
            <a class="h1 logo" href="{{ route('home') }}">
                Schule
            </a>
        </div>
        <ul class="nav-list">
            <li><a class="h5" href="{{ route('students') }}">Students</a></li>
            <li><a class="h5" href="{{ route('departments') }}">Departments</a></li>
        </ul>
    </nav>
    @yield('content')

</body>

</html>
