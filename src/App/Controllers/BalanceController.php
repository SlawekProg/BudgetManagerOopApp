<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\BalanceService;
use Framework\TemplateEngine;

class BalanceController
{
    public function __construct(
        private BalanceService $balanceService,
        private TemplateEngine $view
    ) {}

    public function createView()
    {
        $end   = $_POST['end_date'] ?? date('Y-m-d');
        $start = $_POST['start_date'] ?? date('Y-m-d', strtotime('-1 month'));

        $incomes = $this->balanceService->getUserIncomes($start, $end);
        $expenses = $this->balanceService->getUserExpenses($start, $end);
        $balance = $this->balanceService->getUserBalance($start, $end);
        $incomesPieChart = $this->balanceService->getUserIncomesPieChart($start, $end);
        $expensesPieChart = $this->balanceService->getUserExpensesPieChart($start, $end);

        // przygotowanie danych do JS
        $incomesJsData = json_encode($this->preparePieChartData($incomesPieChart));
        $expensesJsData = json_encode($this->preparePieChartData($expensesPieChart));

        echo $this->view->render("balance.php", [
            'incomes' => $incomes,
            'expenses' => $expenses,
            'balance' => $balance,
            'oldFormData' => [
                'start_date' => $start,
                'end_date' => $end
            ],
            'incomesJsData' => $incomesJsData,
            'expensesJsData' => $expensesJsData
        ]);
    }

    private function preparePieChartData(array $data): array
    {
        $result = [['Kategoria', 'Kwota']];
        foreach ($data as $row) {
            $result[] = [$row['category'], (float)$row['total_amount']];
        }
        return $result;
    }
}
