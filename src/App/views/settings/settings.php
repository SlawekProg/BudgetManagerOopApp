<?php include $this->resolve("partials/_header.php") ?>

<main id="bilans" class="overflow-auto mt-5 mb-5" style="height: calc(100vh - 120px - 100px);">
    <section class="">
        <div class="container px-4 py-5" id="featured-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <h1 class="pb-2 border-bottom">Ustawienia użytkownika</h1>
                    <p class="fs-5"> Dostosuj aplikacje do swoich potrzeb.</p>
                </div>
            </div>

            <div class="row g-4 py-3 row-cols-1 row-cols-lg-3 mt-2">
                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <?php $elementId = "Incomes"; ?>
                    <div class="feature mb-3">
                        <label for="incomesCategorySelect" class="form-label fs-4">Kategorie Przychodów</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <select class="form-select w-100 text-truncate" name="incomeCategory" id="incomesCategorySelect">
                                    <option value="" selected disabled hidden>Wybierz kategorie</option>
                                    <?php foreach ($incomesCategories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['id']) ?>"
                                            <?= (isset($oldFormData['income_type']) && $oldFormData['income_type'] == $category['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($category['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-between">
                                <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#addIncomesCategoryModal">➕</button>
                                <button type="button" class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editIncomesCategoryModal">✏️</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteIncomesCategoryModal">❌</button>
                            </div>
                        </div>
                        <?php include $this->resolve("partials/modals/_addCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_editCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_deleteCategoryModal.php") ?>
                    </div>
                </form>

                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <?php $elementId = "Expenses"; ?>
                    <div class="feature mb-3">
                        <label for="expensesCategorySelect" class="form-label fs-4">Kategorie Wydatków</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <select class="form-select w-100 text-truncate" name="expenseCategory" id="expensesCategorySelect">
                                    <option value="" selected disabled hidden>Wybierz kategorie</option>
                                    <?php foreach ($expensesCategories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['id']) ?>"
                                            <?= (isset($oldFormData['expense_type']) && $oldFormData['expense_type'] == $category['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($category['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-between">
                                <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#addExpensesCategoryModal">➕</button>
                                <button type="button" class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editExpensesCategoryModal">✏️</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteExpensesCategoryModal">❌</button>
                            </div>
                        </div>
                        <?php include $this->resolve("partials/modals/_addCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_editCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_deleteCategoryModal.php") ?>
                    </div>
                </form>

                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <?php $elementId = "Payments"; ?>
                    <div class="feature mb-3">
                        <label for="paymentsCategorySelect" class="form-label fs-4">Kategorie Płatności</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <select class="form-select w-100 text-truncate" name="paymentCategory" id="paymentsCategorySelect">
                                    <option value="" selected disabled hidden>Wybierz kategorie</option>
                                    <?php foreach ($payments as $category): ?>
                                        <option value="<?= htmlspecialchars($category['id']) ?>"
                                            <?= (isset($oldFormData['payment_type']) && $oldFormData['payment_type'] == $category['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($category['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-between">
                                <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#addPaymentsCategoryModal">➕</button>
                                <button type="button" class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editPaymentsCategoryModal">✏️</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletePaymentsCategoryModal">❌</button>
                            </div>
                        </div>
                        <?php include $this->resolve("partials/modals/_addCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_editCategoryModal.php") ?>
                        <?php include $this->resolve("partials/modals/_deleteCategoryModal.php") ?>
                    </div>
                </form>
            </div>

            <div>
                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <div class="d-flex justify-content-center mb-3 mt-0 col mt-2">
                        <div class="col-4 pe-2 mt-1">
                            <label for="password" class="form-label fs-4">Aktualne hasło</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-4 pe-2 mt-1">
                            <label for="new_password" class="form-label fs-4">Nowe hasło</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label fs-4">Potwierdź zmianę</label>
                            <button type="submit" name="action" value="updatePassword" class="btn btn-light mt-3.5"> ✏️ Zmień hasło</button>
                        </div>
                    </div>
                </form>
                <form method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <div class="d-flex-row justify-content-center mt-5">
                        <label for="" class="form-label fs-4">Usuwanie konta wraz z jego ustawieniami i danymi</label>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteAccountModal"> ❌ Usuń konto i wszystkie dane</button>
                    </div>
                    <?php include $this->resolve("partials/modals/_deleteAccountModal.php") ?>
                </form>
            </div>

        </div>
        </div>
    </section>
</main>

<?php include $this->resolve("partials/_footer.php") ?>

<script src="assets/js/modal.js"></script>

</body>

</html>