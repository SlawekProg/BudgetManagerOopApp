<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class BalanceService
{
    public function __construct(private Database $db) {}

    public function getUserIncomes(string $start, string $end)
    {
        return $this->db->query(
            "SELECT
            icu.name AS category,
            i.amount,
            i.date_of_income,
            i.income_comment
        FROM incomes AS i
        INNER JOIN incomes_category_assigned_to_users AS icu 
            ON icu.id = i.income_category_assigned_to_user_id
        WHERE i.user_id = :user_id
            AND i.date_of_income BETWEEN :startDate AND :endDate",
            [
                'user_id' => $_SESSION['user'],
                'startDate' => $start,
                'endDate' => $end
            ]
        )->findAll();
    }

    public function getUserExpenses(string $start, string $end): array
    {
        return $this->db->query(
            "SELECT
            ecd.name AS category,
            e.amount,
            e.date_of_expense,
            e.expense_comment
        FROM expenses AS e
        INNER JOIN expenses_category_assigned_to_users AS ecd 
            ON ecd.id = e.expense_category_assigned_to_user_id
        WHERE e.user_id = :user_id 
          AND e.date_of_expense BETWEEN :startDate AND :endDate",
            [
                'user_id'   => $_SESSION['user'],
                'startDate' => $start,
                'endDate'   => $end
            ]
        )->findAll();
    }


    public function getUserBalance(string $start, string $end)
    {
        return $this->db->query(
            "SELECT 
                (SELECT COALESCE(SUM(amount), 0) 
                 FROM incomes 
                 WHERE user_id = :user_id AND date_of_income BETWEEN :startDate AND :endDate) AS przychody, 

                (SELECT COALESCE(SUM(amount), 0) 
                 FROM expenses 
                 WHERE user_id = :user_id AND date_of_expense BETWEEN :startDate AND :endDate) AS wydatki, 

                (SELECT COALESCE(SUM(amount), 0) 
                 FROM incomes 
                 WHERE user_id = :user_id AND date_of_income BETWEEN :startDate AND :endDate) - 
                (SELECT COALESCE(SUM(amount), 0) 
                 FROM expenses 
                 WHERE user_id = :user_id AND date_of_expense BETWEEN :startDate AND :endDate) AS bilans",
            [
                'user_id'   => $_SESSION['user'],
                'startDate' => $start,
                'endDate'   => $end
            ]
        )->findAll();
    }

    public function getUserIncomesPieChart(string $start, string $end)
    {
        return $this->db->query(
            "SELECT 
                icd.name AS category,
                SUM(i.amount) AS total_amount
            FROM incomes AS i
            INNER JOIN incomes_category_assigned_to_users AS icd ON icd.id = i.income_category_assigned_to_user_id
            WHERE 
                i.user_id = :user_id 
                AND i.date_of_income BETWEEN :startDate AND :endDate
            GROUP BY icd.name
            ORDER BY total_amount DESC",
            [
                'user_id' => $_SESSION['user'],
                'startDate' => $start,
                'endDate' =>  $end
            ]
        )->findAll();
    }

    public function getUserExpensesPieChart(string $start, string $end): array
    {
        return $this->db->query(
            "SELECT 
                ecd.name AS category,
                SUM(e.amount) AS total_amount
            FROM expenses AS e
            INNER JOIN expenses_category_assigned_to_users AS ecd ON ecd.id = e.expense_category_assigned_to_user_id
            WHERE 
                e.user_id = :user_id 
                AND e.date_of_expense BETWEEN :startDate AND :endDate
            GROUP BY ecd.name
            ORDER BY total_amount DESC",
            [
                'user_id'   => $_SESSION['user'],
                'startDate' => $start,
                'endDate'   => $end
            ]
        )->findAll();
    }


    public function getUserBalancePieChart(string $start, string $end) {}
}
