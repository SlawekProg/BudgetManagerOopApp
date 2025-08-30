<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

use App\Services\{
    ValidatorService,
    ExpenseService,
    CategoryService
};



class ExpensesTransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private ExpenseService $expenseService,
        private CategoryService $categoryService
    ) {}

    public function createView()
    {
        $userPayments = $this->categoryService->getUserPaymentsCategories();

        $userCategories = $this->categoryService->getUserExpensesCategories();

        echo $this->view->render("expenses/createExpense.php", [
            'categories' => $userCategories,
            'payments' => $userPayments
        ]);
    }

    public function createExpense()
    {
        $this->validatorService->validateExpense($_POST);

        $this->expenseService->createExpense($_POST);

        redirectTo('/');
    }
}
