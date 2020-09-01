<nav>
    <div class="nav-wrapper">
        <form method="post" action="/home/search">
            <div class="input-field">
                <input id="search" name="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
</nav>

<br>

<div class="row container">

<?php
if(!empty($data['mesage'])) {
    foreach ($data['mesage'] as $item) {
        echo $item . '<br>';
    }
}
?>

<?php
      //pagination
$pagination = new App\Pagination($data['register'], isset($_GET['page']) ? $_GET['page'] : 1, 5)
?>

<?php
        if(empty($pagination->result())):
            echo "no record found";
        endif;
?>
<?php
    foreach ($pagination->result() as $note): ?>
        <h3 class="light"><a href="/notes/open/<?php echo $note['id']; ?>"> <?php echo $note['title']; ?></a></h3>
        <p> <?php echo $note['text']; ?></p>
        <IMG style="float: left; margin: 0 15px 15px 0;" src="<?php echo URL_BASE;?>/uploads/<?php echo $note['image']; ?>" width="300" alt="image">

    <?php
    if(isset($_SESSION['logged'])): ?>
        <a class="waves-effect waves-light btn blue" href="/notes/update/<?php echo $note['id']; ?>">Update</a>
        <a class="waves-effect waves-light btn deep-orange" href="/notes/delete/<?php echo $note['id']; ?>">Delete</a><br>
    <?php endif; ?>
<?php endforeach; ?>
</div>
<div class="row container">
        <?php
            $pagination->navigator();
        ?>

</div>



