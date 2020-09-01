
<h1>Update the Diary</h1>

<div class="row container">
<?php

if(!empty($data['mesage'])) {
    foreach ($data['mesage'] as $item) {
        echo $item . '<br>';
    }
}
?>


<form action="/notes/update/<?php echo $data['register']['id']; ?>" method="post" enctype="multipart/form-data">
    Title: <input required type="text" value="<?php echo $data['register']['title']; ?>" name="title"> <br>
    Text: <textarea required name="text"><?php echo $data['register']['text']; ?></textarea><br>

    <?php
        if(!empty($data['register']['image'])):
    ?>
           <button name="deleteImage" class="btn orange">Delete Image</button>
            <button name="update">Update</button>
<?php
    else:
?>
        Imagem:     <input type="file" name="foo" required value=""/> <br><br>
        <button name="updateImage">Update</button>
    <?php
        endif;
    ?>


</form>
</div>
