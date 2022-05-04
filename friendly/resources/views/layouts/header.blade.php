<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header class="header">
        <nav class="nav-header">
            <div class=>
                <img src="/resources/assets/Medium-Logo-Black.svg" alt="logo">
                <ul class="ul-nav-header">
                    <li class="ul-nav-header-li"><a href="index.php">Home</a></li>
                    <li class="ul-nav-header-li"><a href="./about.php">About Me</a></li>
                    <li class="ul-nav-header-li"><a href="./contacts.php">Contacts</a></li>
                </ul>
            </div>
            <div class="pages-nav-header">
                <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>
            </div>
        </nav>
    </header>

    <main>

        @yield('content')

    </main>

</body>

</html>