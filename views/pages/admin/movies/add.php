<?php

/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start'); ?>
<h1>Add movie page</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <div class="form-group">
        <input type="text" name="name" id="name">
    </div>
    <?php if ($session->has('name')): ?>
        <ul>
            <?php foreach ($session->getFlash('name') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <label for="name">Image</label>
    <div class="form-group">
        <input type="file" name="image" id="image">
    </div>
    <?php if ($session->has('name')): ?>
        <ul>
            <?php foreach ($session->getFlash('name') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div>
        <button>Add</button>
    </div>
</form>
<?php $view->component('end'); ?>

<style>


</style>
