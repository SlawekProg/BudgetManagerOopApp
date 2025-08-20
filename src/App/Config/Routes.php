<?php

declare(strict_types=1);

namespace App\Config;


use App\Controllers\{
    HomeController,
    AboutController,
    AuthController,
    TransactionController,
    ReceiptController,
    ErrorController,

    MainPageController,
    IncomesTransactionController,
    ExpensesTransactionController,
    BalanceController,
    SettingsController
};

use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes($app)
{
    $app->get('/mainPage', [MainPageController::class, 'mainPage'])->add(GuestOnlyMiddleware::class);

    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);

    $app->get('/about', [AboutController::class, 'about']);

    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);

    $app->get('/incomes', [IncomesTransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/incomes', [IncomesTransactionController::class, 'createIncome'])->add(AuthRequiredMiddleware::class);

    $app->get('/expenses', [ExpensesTransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/expenses', [ExpensesTransactionController::class, 'createExpense'])->add(AuthRequiredMiddleware::class);

    $app->get('/balance', [BalanceController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/balance', [BalanceController::class, 'createView'])->add(AuthRequiredMiddleware::class);

    $app->get('/settings', [SettingsController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings', [SettingsController::class, 'handleForm'])->add(AuthRequiredMiddleware::class);

    $app->setErrorHandler([ErrorController::class, 'notFound']);


    // $app->get('/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    // $app->post('/transaction', [TransactionController::class, 'create'])->add(AuthRequiredMiddleware::class);
    // $app->get('/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class);
    // $app->post('/transaction/{transaction}', [TransactionController::class, 'edit'])->add(AuthRequiredMiddleware::class);
    // $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);


    // $app->get('/transaction/{transaction}/receipt', [ReceiptController::class, 'uploadView'])->add(AuthRequiredMiddleware::class);
    // $app->post('/transaction/{transaction}/receipt', [ReceiptController::class, 'upload'])->add(AuthRequiredMiddleware::class);
    // $app->get('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->add(AuthRequiredMiddleware::class);
    // $app->delete('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->add(AuthRequiredMiddleware::class);

}
