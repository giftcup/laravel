<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/styles/header.css">
    <link rel="stylesheet" href="/styles/home.css">
    
</head>

<body>

    
    <nav class="nav-header">
        <div id="nav-div">
            <div class="logo-title">
                <h1>Friendly</h1>
            </div>

            <div class="page-nav-header">
                <ul class="nav-header-list">
                    <li class="ul-nav-header-li"><a href="index.php">Home</a></li>
                    <li class="ul-nav-header-li"><a href="./about.php">Blogs</a></li>
                    <li class="ul-nav-header-li"><a href="./contacts.php">Contacts</a></li>
                </ul>
                <a href="login.php" class="btn btn-lgn">Login</a>
                <a href="signup.php" class="btn btn-sup">Signup</a>
            </div>
        </div>
    </nav>

    <main>

        @yield('content')

    </main>

</body>

</html>