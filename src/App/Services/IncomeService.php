<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class IncomeService
{
    public function __construct(private Database $db) {}

    public function getDefaultIncomeCategories(): array
    {
        return $this->db
            ->query("SELECT id, name FROM incomes_category_default ORDER BY name ASC")
            ->findAll();
    }

    public function createIncome(array $formData)
    {
        $this->db->query(
            "INSERT INTO incomes(
                user_id, 
                income_category_assigned_to_user_id,
                amount,
                date_of_income,
                income_comment)
            VALUES(:user_id, :income_type, :amount, :date, :description)",
            [
                'user_id' => $_SESSION['user'],
                'income_type' => $formData['income_type'],
                'amount' => $formData['amount'],
                'date' => $formData['date'],
                'description' => $formData['description']
            ]
        );
    }

    public function getUserIncomes(int $length, int $offset)
    {
        // $searchTerm = addcslashes($_GET['s'] ?? '', '%_');
        // $params = [
        //     'user_id' => $_SESSION['user'],
        //     'description' => "%{$searchTerm}%"
        // ];

        // $transactions = $this->db->query(
        //     "SELECT * , DATE_FORMAT(date, '%Y-%m-%d') as formatted_date 
        //     FROM transactions 
        //     WHERE user_id = :user_id
        //     AND description LIKE :description
        //     LIMIT {$length} OFFSET {$offset}",
        //     $params
        // )->findAll();

        // $transactions = array_map(function (array $transaction) {
        //     $transaction['receipts'] = $this->db->query(
        //         "SELECT * FROM receipts WHERE transaction_id = :transaction_id",
        //         ['transaction_id' => $transaction['id']]
        //     )->findAll();

        //     return $transaction;
        // }, $transactions);

        // $transactionCount = $this->db->query(
        //     "SELECT COUNT(*) 
        //     FROM transactions 
        //     WHERE user_id = :user_id
        //     AND description LIKE :description",
        //     $params
        // )->count();

        // return [$transactions, $transactionCount];
    }

    public function getUserIncome(string $id)
    {
        // return $this->db->query(
        //     "SELECT *, DATE_FORMAT(date, '%Y-%m-%d') as formatted_date 
        //     FROM transactions 
        //     WHERE id = :id 
        //     AND user_id = :user_id",
        //     [
        //         'id' => $id,
        //         'user_id' => $_SESSION['user']
        //     ]
        // )->find();
    }

    public function updateIncome(array $formData, int $id)
    {
        // $formattedDate = "{$formData['date']} 00:00:00";

        // $this->db->query(
        //     "UPDATE transactions
        //     SET description = :description,
        //     amount = :amount,
        //     date = :date
        //     WHERE id = :id
        //     AND user_id = :user_id",
        //     [
        //         'description' => $formData['description'],
        //         'amount' => $formData['amount'],
        //         'date' => $formattedDate,
        //         'id' => $id,
        //         'user_id' => $_SESSION['user']
        //     ]
        // );
    }

    public function delete(int $id)
    {
        // $this->db->query(
        //     "DELETE FROM transactions WHERE id = :id AND user_id = :user_id",
        //     [
        //         'id' => $id,
        //         'user_id' => $_SESSION['user']
        //     ]
        // );
    }
}
