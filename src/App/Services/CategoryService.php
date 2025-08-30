<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class CategoryService
{
    public function __construct(
        private Database $db,
    ) {}

    public function getUserIncomesCategories(): array
    {
        return $this->db
            ->query(
                "SELECT id, name 
                FROM incomes_category_assigned_to_users 
                WHERE user_id = :user_id 
                ORDER BY name ASC",
                [
                    'user_id' => $_SESSION['user']
                ]
            )->findAll();
    }

    public function getDefaultIncomesCategories(): array
    {
        return $this->db
            ->query("SELECT id, name FROM incomes_category_default ORDER BY name ASC")
            ->findAll();
    }
    public function addIncomesCategory(array $formData)
    {
        $this->db->query(
            "INSERT INTO incomes_category_assigned_to_users (user_id, name)
            VALUES (:user_id, :name)",
            [
                'user_id' => $_SESSION['user'],
                'name' => $formData['new_name']
            ]
        );
    }
    public function updateIncomesCategory(array $formData)
    {
        $this->db->query(
            "UPDATE incomes_category_assigned_to_users
            SET name = :name
            WHERE id = :id
            AND user_id = :user_id",
            [
                'name' => $formData['edit_name'],
                'id' => $formData['incomeCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }
    public function deleteIncomesCategory(array $formData)
    {
        $this->db->query(
            "DELETE FROM incomes_category_assigned_to_users 
            WHERE name = :name 
            AND id = :id 
            AND user_id = :user_id",
            [
                'name' => $formData['delete_name'],
                'id' => $formData['incomeCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function getDefaultExpensesCategories(): array
    {
        return $this->db
            ->query("SELECT id, name FROM expenses_category_default ORDER BY name ASC")
            ->findAll();
    }

    public function getUserExpensesCategories(): array
    {
        return $this->db
            ->query(
                "SELECT id, name 
                FROM expenses_category_assigned_to_users 
                WHERE user_id = :user_id 
                ORDER BY name ASC",
                [
                    'user_id' => $_SESSION['user']
                ]
            )->findAll();
    }
    public function addExpensesCategory(array $formData)
    {
        $this->db->query(
            "INSERT INTO expenses_category_assigned_to_users (user_id, name)
            VALUES (:user_id, :name)",
            [
                'user_id' => $_SESSION['user'],
                'name' => $formData['new_name']
            ]
        );
    }
    public function updateExpensesCategory(array $formData)
    {
        $this->db->query(
            "UPDATE expenses_category_assigned_to_users
            SET name = :name
            WHERE id = :id
            AND user_id = :user_id",
            [
                'name' => $formData['edit_name'],
                'id' => $formData['expenseCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }
    public function deleteExpensesCategory(array $formData)
    {
        $this->db->query(
            "DELETE FROM expenses_category_assigned_to_users 
            WHERE name = :name 
            AND id = :id 
            AND user_id = :user_id",
            [
                'name' => $formData['delete_name'],
                'id' => $formData['expenseCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function getDefaultPaymentsCategory(): array
    {
        return $this->db
            ->query("SELECT id, name FROM payment_methods_default ORDER BY name ASC")
            ->findAll();
    }

    public function getUserPaymentsCategories(): array
    {
        return $this->db
            ->query(
                "SELECT id, name 
                FROM payment_methods_assigned_to_users 
                WHERE user_id = :user_id 
                ORDER BY name ASC",
                [
                    'user_id' => $_SESSION['user']
                ]
            )->findAll();
    }
    public function addPaymentsCategory(array $formData)
    {
        $this->db->query(
            "INSERT INTO payment_methods_assigned_to_users (user_id, name)
            VALUES (:user_id, :name)",
            [
                'user_id' => $_SESSION['user'],
                'name' => $formData['new_name']
            ]
        );
    }
    public function updatePaymentsCategory(array $formData)
    {
        $this->db->query(
            "UPDATE payment_methods_assigned_to_users
            SET name = :name
            WHERE id = :id
            AND user_id = :user_id",
            [
                'name' => $formData['edit_name'],
                'id' => $formData['paymentCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }
    public function deletePaymentsCategory(array $formData)
    {
        $this->db->query(
            "DELETE FROM payment_methods_assigned_to_users 
            WHERE name = :name 
            AND id = :id 
            AND user_id = :user_id",
            [
                'name' => $formData['delete_name'],
                'id' => $formData['paymentCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function updatePassword(array $formData)
    {
        $newPassword = password_hash($formData['new_password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user = $this->db->query("SELECT password FROM users WHERE id = :id", [
            'id' => $_SESSION['user']
        ])->find();

        $passwordMatch = password_verify(
            $formData['password'],
            $user['password']
        );

        if ($passwordMatch) {
            $this->db->query(
                "UPDATE users
                SET password = :password
                WHERE id = :id",
                [
                    'password' => $newPassword,
                    'id' => $_SESSION['user']
                ]
            );
        }
    }
    public function deleteAccount(array $formData)
    {
        $user = $this->db->query("SELECT password FROM users WHERE id = :id", [
            'id' => $_SESSION['user']
        ])->find();

        $passwordMatch = password_verify(
            $formData['password'],
            $user['password']
        );

        if ($passwordMatch) {
            $this->db->query(
                "DELETE FROM users
                WHERE id = :id",
                [
                    'id' => $_SESSION['user']
                ]
            );
        }
    }

    public function loadDefaultCategoryToUserCategory()
    {
        $defaultPaymentsCategory = $this->getDefaultPaymentsCategory();

        foreach ($defaultPaymentsCategory as $category) {
            $this->db->query(
                "INSERT INTO payment_methods_assigned_to_users (user_id, name)
         VALUES (:user_id, :name)",
                [
                    'user_id' => $_SESSION['user'],
                    'name'    => $category['name']
                ]
            );
        }
        $defaultIncomesCategory = $this->getDefaultIncomesCategories();

        foreach ($defaultIncomesCategory as $category) {
            $this->db->query(
                "INSERT INTO incomes_category_assigned_to_users (user_id, name)
         VALUES (:user_id, :name)",
                [
                    'user_id' => $_SESSION['user'],
                    'name'    => $category['name']
                ]
            );
        }

        $defaultExpensesCategory = $this->getDefaultExpensesCategories();

        foreach ($defaultExpensesCategory as $category) {
            $this->db->query(
                "INSERT INTO expenses_category_assigned_to_users (user_id, name)
         VALUES (:user_id, :name)",
                [
                    'user_id' => $_SESSION['user'],
                    'name'    => $category['name']
                ]
            );
        }
    }
}
