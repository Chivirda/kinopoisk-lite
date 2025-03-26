<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>

<?php $view->component('start'); ?>
<h1>Add movie page</h1>

<form action="" method="post">
    <label for="name">Name</label>
    <div>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <button>Add</button>
    </div>
</form>
<?php $view->component('end'); ?>
