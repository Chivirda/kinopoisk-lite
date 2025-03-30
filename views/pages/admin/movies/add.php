<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start'); ?>
<h1>Add movie page</h1>

<form action="" method="post">
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
    <div>
        <button>Add</button>
    </div>
</form>
<?php $view->component('end'); ?>

<style>
    form {
        max-width: 400px;
        margin: 30px auto;
        padding: 30px;
        background: #2a2a2a;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        color: #f0f0f0;
        font-family: 'Arial', sans-serif;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        background: #3a3a3a;
        border: 1px solid #444;
        border-radius: 6px;
        color: #fff;
        font-size: 15px;
        transition: all 0.3s;
    }

    input[type="text"]:focus {
        border-color: #00d4ff;
        box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.2);
        outline: none;
    }

    ul {
        margin: 8px 0 20px;
        padding: 0;
    }

    li {
        font-size: 13px;
        padding: 4px 0;
        color: #ff5e5e;
    }

    button {
        width: 100%;
        padding: 14px;
        background: #00d4ff;
        color: #111;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
    }

    button:hover {
        background: #00b8e0;
        transform: translateY(-2px);
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>
