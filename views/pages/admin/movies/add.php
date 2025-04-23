<?php

/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>
<main>
    <div class="container">
        <h3 class="mt-3 text-light">Добавление фильма</h3>
        <hr>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Иван Иванов">
                        <label for="name">Название</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <textarea style="height: 100px;" class="form-control" id="description" placeholder="name@areaweb.su"></textarea>
                        <label for="description">Описание</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <button class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
</main><?php $view->component('end'); ?>
