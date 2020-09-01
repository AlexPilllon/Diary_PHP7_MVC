
<div class="row container">
<h1>Create a New News</h1>

<?php

    if(!empty($data['mesage'])) {
        foreach ($data['mesage'] as $item) {
            echo $item . '<br>';
        }
    }
?>

<form action="/notes/create" method="post" enctype="multipart/form-data">
    Title: <input type="text" required name="title"> <br>
    Text: <textarea name="text" required></textarea>
    Imagem:     <input type="file" name="foo" required value=""/> <br><br>

    <button name="register">Register</button>
</form>
</div>
