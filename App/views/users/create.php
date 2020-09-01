
<h1>Create a New User</h1>

<?php

    if(!empty($data['mesage'])) {
        foreach ($data['mesage'] as $item) {
            echo $item . '<br>';
        }
    }
?>


<form action="/users/create" method="post">
    Name: <input type="text" name="name"> <br>
    Email: <input type="text" name="email"> <br>
    Pass: <input type="password" name="pass"> <br>
    <button name="register">Register</button>
</form>
