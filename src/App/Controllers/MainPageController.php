<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class MainPageController
{
    public function __construct(private TemplateEngine $view) {}

    public function mainPage()
    {
        echo $this->view->render("mainPage.php", [
            'title' => 'MainPage',
        ]);
    }
}
