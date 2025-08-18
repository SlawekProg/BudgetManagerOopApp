<?php include $this->resolve("partials/_header.php") ?>

<main id="bilans" class="overflow-auto mt-5 mb-5" style="height: calc(100vh - 120px - 100px);">
    <section class="">
        <div class="container px-4 py-5" id="featured-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <h1 class="pb-2 border-bottom">Ustawienia użytkownika</h1>
                    <p>Dostosuj aplikacje do swoich potrzeb.</p>
                </div>
            </div>
            <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList()">Kategorie Przychodów</button>
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
                </div>
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList2()">Kategorie Wydatków</button>
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
                </div>
                <div class="feature col">
                    <div class="text-bg-primary fs-2 rounded position-relative" style="height: auto;">
                        <div class="d-flex justify-content-center mb-2">
                            <button class="btn btn-light" onclick="toggleList3()">Kategorie Płatności</button>
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
                </div>
            </div>
        </div>
        </div>
    </section>
</main>

<?php include $this->resolve("partials/_footer.php") ?>