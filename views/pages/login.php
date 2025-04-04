<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>
<h1>Login</h1>

<form action="" method="post">
    <label for="email">Email</label>
    <div class="form-group">
        <input type="email" name="email" id="email">
    </div>
    <?php if ($session->has('email')): ?>
        <ul>
            <?php foreach ($session->getFlash('email') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <label for="password">Password</label>
    <div class="form-group">
        <input type="password" name="password" id="password">
    </div>
    <?php if ($session->has('password')): ?>
        <ul>
            <?php foreach ($session->getFlash('password') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="form-group">
        <button type="submit">Login</button>
    </div>
</form>
<?php $view->component('end'); ?>
