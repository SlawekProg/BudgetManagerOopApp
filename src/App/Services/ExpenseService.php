<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class ExpenseService
{
    public function __construct(private Database $db) {}

    public function getDefaultPaymentType(): array
    {
        return $this->db
            ->query("SELECT id, name FROM payment_methods_default ORDER BY name ASC")
            ->findAll();
    }

    public function getDefaultExpenseCategories(): array
    {
        return $this->db
            ->query("SELECT id, name FROM expenses_category_default ORDER BY name ASC")
            ->findAll();
    }

    public function createExpense(array $formData)
    {
        $this->db->query(
            "INSERT INTO expenses(
                user_id, 
                expense_category_assigned_to_user_id,
                payment_method_assigned_to_user_id,
                amount,
                date_of_expense,
                expense_comment)
            VALUES(:user_id, :expense_type, :payment_type, :amount, :date, :description)",
            [
                'user_id' => $_SESSION['user'],
                'expense_type' => $formData['expense_type'],
                'payment_type' => $formData['payment_type'],
                'amount' => $formData['amount'],
                'date' => $formData['date'],
                'description' => $formData['description']
            ]
        );
    }

    public function getUserExpenses(int $length, int $offset)
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

    public function getUserExpense(string $id)
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

    public function updateExpense(array $formData, int $id)
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
