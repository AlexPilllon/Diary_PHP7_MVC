
<br>
<?php

if(!empty($data['mesage'])) {
    foreach ($data['mesage'] as $item) {
        echo $item . '<br>';
    }
}
?>

<div class="row container">
<h1 align="center" >Login</h1>


<form action="/home/login" method="post">
    <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate">
            <label for="email">Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input id="password" type="password" name="pass" class="validate">
            <label for="password">Password</label>
        </div>
    </div>

    <button class="waves-effect waves-light btn blue" name="login">Login</button>
</form>

<?php
