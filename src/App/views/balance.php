<?php include $this->resolve("partials/_header.php") ?>

<main id="bilans" class="overflow-auto mt-5 mb-5" style="height: calc(100vh - 120px - 100px);">
    <section class="">
        <div class="container px-4 py-5" id="featured-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <h1 class="pb-2 border-bottom">Bilans Finansowy</h1>
                    <p>Poniżej bilans miesięczny, ustawiając daty otrzymasz bilans z danego okresu.</p>
                </div>
                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <div class="d-flex justify-content-center mb-3 mt-0">
                        <button type="submit" class="btn btn-light">Aktualizuj dane po zmanie daty</button>
                    </div>
                    <div class="col-ld-6 col-md-12 input-group">
                        <span class="input-group-text bg-white border-end-0 px-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                        </span>
                        <input
                            type="date"
                            class="form-control form-control border-start-0 me-1"
                            name="start_date"
                            value="<?= isset($oldFormData['start_date']) && $oldFormData['start_date'] !== '' ? htmlspecialchars($oldFormData['start_date']) : date('Y-m-d', strtotime('-1 month')) ?>">

                        <span class="input-group-text bg-white border-end-0 px-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                        </span>
                        <input
                            type="date"
                            class="form-control form-control border-start-0"
                            name="end_date"
                            value="<?= isset($oldFormData['end_date']) && $oldFormData['end_date'] !== '' ? htmlspecialchars($oldFormData['end_date']) : date('Y-m-d') ?>">
                    </div>
                </form>
            </div>
            <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList()">Szczegóły Przychodów</button>
                        </div>
                        <div id="listaDanych" class="ukryta-lista position-absolute">
                            <ul class="fs-6">
                                <?php foreach ($incomes as $income): ?>
                                    <li>
                                        <?= htmlspecialchars($income['category']) ?>
                                        <ul>
                                            <li>
                                                <?= htmlspecialchars($income['amount'] . ' zł ' . $income['date_of_income'] . ' ' . $income['income_comment']) ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <h2 class="fs-2 text-body-emphasis">Przychody</h2>
                    <p class="fw-bold">„Zarabianie to sztuka – praktykuj ją codziennie.” Sprawdź w szczegółach swoje dochody</p>
                    <div id="incomesPiechart"></div>
                </div>
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList2()">Szczegóły Wydatków</button>
                        </div>
                        <div id="listaDanych2" class="ukryta-lista position-absolute">
                            <ul class="fs-6">
                                <?php foreach ($expenses as $expense): ?>
                                    <li>
                                        <?= htmlspecialchars($expense['category']) ?>
                                        <ul>
                                            <li>
                                                <?= htmlspecialchars($expense['amount'] . ' zł ' . $expense['date_of_expense'] . ' ' . $expense['expense_comment']) ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <h2 class="fs-2 text-body-emphasis">Wydatki</h2>
                    <p class="fw-bold">„Jeśli nie kontrolujesz swoich wydatków, one kontrolują Ciebie.” Sprawdź w szczegółach wydatki</p>
                    <div id="expensesPiechart"></div>
                </div>
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList3()">Szczegóły Podsumowania</button>
                        </div>
                        <div id="listaDanych3" class="ukryta-lista position-absolute">
                            <ul class="fs-6" style="list-style-type: none;">
                                <li>
                                    <hr>Suma Przychodów
                                </li>
                                <li><?= htmlspecialchars($balance[0]['przychody']) ?></li>
                                <li>
                                    <hr>Suma Wydatków
                                </li>
                                <li><?= htmlspecialchars($balance[0]['wydatki']) ?></li>
                                <li>
                                    <hr>Bilans
                                </li>
                                <li><?= htmlspecialchars($balance[0]['bilans']) ?></li>
                                <li>
                                    <hr>
                                </li>
                                <?php if ($balance[0]['bilans'] > 0): ?>
                                    <li>Gratulacje Mistrzu Oszczędzania</li>
                                <?php elseif ($balance[0]['bilans'] < 0): ?>
                                    <li>Musisz popracować nad wydatkami</li>
                                <?php else : ?>
                                    <li>Wyszedłeś na 0, nie taki jest Twój cel</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <h2 class="fs-2 text-body-emphasis">Podsumowanie</h2>
                    <p class="fw-bold">„Bilans dodatni to nie tylko liczba - to spokój ducha.” Sprawdź w szczegółach swoje podsumowanie</p>
                    <div id="chart">
                        <canvas id="chartjs-line" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include $this->resolve("partials/_footer.php") ?>

<script>
    window.incomesDataFromPHP = <?= $incomesJsData ?>;
    window.expensesDataFromPHP = <?= $expensesJsData ?>;
</script>
<script src="assets/js/charts.js"></script>

</body>

</html>