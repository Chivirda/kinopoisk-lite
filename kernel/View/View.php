<?php

namespace App\Kernel\View;

class View
{
    public function page(string $page): void
    {
        extract([
            "view" => $this
        ]);
        
        include_once APP_PATH . "/views/pages/$page.php";
    }

    public function component(string $component): void
    {
        include_once APP_PATH . "/views/components/$component.php";
    }
}
