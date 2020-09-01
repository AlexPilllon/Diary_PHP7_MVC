<h1>Manage the Users</h1>

<?php

if(!empty($data['mesage'])) {
    foreach ($data['mesage'] as $item) {
        echo $item . '<br>';
    }
}
?>


<form action="/users/update/<?php echo $data['update']['id']; ?>" method="post">

    Name: <input type="text" value="<?php echo $data['update']['name']; ?>" name="name"> <br>
    Email: <input type="text" name="email" value="<?php echo $data['update']['email']; ?>"> <br>
    Pass: <input type="password" name="pass" value="<?php echo $data['update']['pass']; ?>">



    <button name="update">Update</button>
</form>
<?php
