<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{
    IncomeService,
    ExpenseService,
    ValidatorService,
    CategoryService,
    UserService
};

class SettingsController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private ExpenseService $expenseService,
        private IncomeService $incomeService,
        private CategoryService $categoryService,
        private UserService $userService
    ) {}

    public function createView()
    {
        $payments = $this->categoryService->getUserPaymentsCategories();
        $incomesCategories = $this->categoryService->getUserIncomesCategories();
        $expensesCategories = $this->categoryService->getUserExpensesCategories();

        echo $this->view->render("settings/settings.php", [
            'incomesCategories' => $incomesCategories,
            'expensesCategories' => $expensesCategories,
            'payments' => $payments
        ]);
    }
    public function handleForm()
    {
        $action = $_POST['action'] ?? '';

        switch ($action) {
            case 'addIncomes':
                $this->categoryService->addIncomesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'editIncomes':
                $this->categoryService->updateIncomesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'deleteIncomes':
                $this->categoryService->deleteIncomesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'addExpenses':
                $this->categoryService->addExpensesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'editExpenses':
                $this->categoryService->updateExpensesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'deleteExpenses':
                $this->categoryService->deleteExpensesCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'addPayments':
                $this->categoryService->addPaymentsCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'editPayments':
                $this->categoryService->updatePaymentsCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'deletePayments':
                $this->categoryService->deletePaymentsCategory($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'updatePassword':
                $this->categoryService->updatePassword($_POST);
                redirectTo($_SERVER['HTTP_REFERER']);
                break;
            case 'deleteAccount':
                $this->categoryService->deleteAccount($_POST);
                $this->userService->logout();
                redirectTo('/');
                break;
            default:
                redirectTo('/');
                break;
        }
    }
}
