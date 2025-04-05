<?php

/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>
<header>
  <?php if ($auth->check()): ?>
    <h3>User: <?= $user->email() ?></h3>
    <button>Logout</button>
    <hr>
  <?php endif; ?>
</header>
