<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <h1>Class list</h1>

    <ol>
        <li>Acha Rha'ah  <a href="{{ route('studentDetails', ['id' => 1] )}}">details</a></li>
        <li>Edwin Bimela <a href="{{ route('studentDetails', ['id' => 2] ) }}">details</a></li>
        <li>Ngewung Sonia <a href="{{ route('studentDetails', ['id' => 3] ) }}">details</a></li>
        <li>Fongoh Martin <a href="{{ route('studentDetails', ['id' => 4] ) }}">details</a></li>
        <li>John Doe <a href="{{ route('studentDetails', ['id' => 5] ) }}">details</a></li>
    </ol>
</body>
</html>