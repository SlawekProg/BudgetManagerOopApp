<?php

declare(strict_types=1);

// Funkcja dump die do debugowanie, wyśiwetla daną zmienną i zatrzymujw script
function dd(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//Funkcja zapobiega atakom XSS (Cross-Site Scripting), gdy wyświetlasz dane od użytkownika.
function e(mixed $value)
{
    return htmlspecialchars((string) $value);
}

//Funkcja przekierowująca na inną strone
function redirectTo(string $path)
{
    header("Location: {$path}");
    http_response_code(302);
    exit;
}
