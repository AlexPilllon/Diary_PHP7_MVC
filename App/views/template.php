<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>PHP7 MVC</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<!--
    <img src="<?php echo URL_BASE;?>/images/image.jpg";
    -->

<nav class="blue">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo">MVC</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

            <li> <a href="/">Block Diary</a> </li>

            <?php
            if(isset($_SESSION['logged'])): ?>
            <li><a href="/notes/create">Create Diary</a></li>
            <li><a href="/users/create">Create New User</a></li>
            <?php endif; ?>

            <?php if(!isset($_SESSION['logged'])): ?>
            <li><a href="/home/login">Login</a></li>
            <?php else: ?>
                Hello <?php echo $_SESSION['userName']; ?>
            <li><a href="/home/logout">Logout</a></li>
            <?php endif; ?>

        </ul>
    </div>
</nav>

    <?php
        require_once '../App/views/'.$view.'.php';

    ?>
</body>
</html>
