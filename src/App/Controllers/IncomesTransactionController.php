<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{CategoryService, ValidatorService, IncomeService};

class IncomesTransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private IncomeService $incomeService,
        private CategoryService $categoryService
    ) {}

    public function createView()
    {
        $userCategories = $this->categoryService->getUserIncomesCategories();

        echo $this->view->render("incomes/createIncome.php", [
            'categories' => $userCategories
        ]);
    }

    public function createIncome()
    {
        $this->validatorService->validateIncome($_POST);

        $this->incomeService->createIncome($_POST);

        redirectTo('/');
    }
}
