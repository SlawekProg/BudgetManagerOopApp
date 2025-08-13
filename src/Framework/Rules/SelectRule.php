<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class SelectRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        // Działa dla pojedynczego i multiple select
        if (!isset($data[$field])) {
            return false;
        }

        if (is_array($data[$field])) {
            // Multiple select – musi mieć przynajmniej jedną wybraną wartość
            return count(array_filter($data[$field], fn($v) => $v !== '')) > 0;
        }

        // Single select – wartość nie może być pusta
        return trim($data[$field]) !== '';
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid Select.";
    }
}
