<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

use App\Services\{ValidatorService, ExpenseService};



class ExpensesTransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private ExpenseService $expenseService
    ) {}

    public function createView()
    {
        $payments = $this->expenseService->getDefaultPaymentType();
        $categories = $this->expenseService->getDefaultExpenseCategories();

        echo $this->view->render("expenses/createExpense.php", [
            'categories' => $categories,
            'payments' => $payments
        ]);
    }

    public function createExpense()
    {
        $this->validatorService->validateExpense($_POST);

        $this->expenseService->createExpense($_POST);

        redirectTo('/');
    }
}
