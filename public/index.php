<?php
// Ładujemy plik z funkcjami ogólnymi
include __DIR__ . '/../src/App/functions.php';

//Uruchamiamy bootsrap.php i przypisujemy to co zwróci do $app (obiekt klasy App w tym przypadku)
$app = include __DIR__ . '/../src/App/bootstrap.php';

//Na zwróconym obiekcie uruchamiamy metode run
$app->run();
