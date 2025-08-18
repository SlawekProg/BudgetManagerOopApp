<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Paths;
use App\Services\{
    BalanceService,
    ValidatorService,
    UserService,
    TransactionService,
    ReceiptService,
    ExpenseService,
    IncomeService
};

return [
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn() => new ValidatorService(),
    Database::class => fn() => new Database($_ENV['DB_DRIVER'], [
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME']
    ], $_ENV['DB_USER'], $_ENV['DB_PASS']),
    UserService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new UserService($db);
    },
    TransactionService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new TransactionService($db);
    },

    ExpenseService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new ExpenseService($db);
    },

    IncomeService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new IncomeService($db);
    },

    BalanceService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new BalanceService($db);
    },

    ReceiptService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new ReceiptService($db);
    }
];
