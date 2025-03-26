<?php

namespace App\Kernel\View;

class View
{
    public function page(string $page): void
    {
        include_once APP_PATH . "/views/pages/$page.php";
    }
}
