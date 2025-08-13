<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, IncomeService};

class IncomesTransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private IncomeService $incomeService
    ) {}

    public function createView()
    {
        $categories = $this->incomeService->getDefaultIncomeCategories();

        echo $this->view->render("incomes/createIncome.php", [
            'categories' => $categories
        ]);
    }

    public function createIncome()
    {
        $this->validatorService->validateIncome($_POST);

        $this->incomeService->createIncome($_POST);

        redirectTo('/');
    }
}
