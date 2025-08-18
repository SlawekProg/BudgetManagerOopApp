<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{
    IncomeService,
    ExpenseService,
    ValidatorService
};

class SettingsController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private ExpenseService $expenseService,
        private IncomeService $incomeService
    ) {}

    public function createView()
    {
        $payments = $this->expenseService->getDefaultPaymentType();
        $incomesCategories = $this->expenseService->getDefaultExpenseCategories();
        $expensesCategories = $this->incomeService->getDefaultIncomeCategories();

        echo $this->view->render("settings.php", [
            'incomesCategories' => $incomesCategories,
            'expensesCategories' => $expensesCategories,
            'payments' => $payments
        ]);
    }
}
