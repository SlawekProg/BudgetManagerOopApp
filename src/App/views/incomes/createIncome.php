<?php include $this->resolve("partials/_header.php") ?>

<main id="dodajPrzychod">
    <section class="pt-3 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px; background-color: rgba(0, 0, 0, 0.2);">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-4 mt-0 mb-5">Dodaj Przychód</p>
                                    <form class="mx-1 mx-md-4" method="POST">
                                        <?php include $this->resolve("partials/_csrf.php"); ?>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-coin" viewBox="0 0 16 16">
                                                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                    </svg>
                                                </span>
                                                <input
                                                    type="number"
                                                    class="form-control border-start-0"
                                                    placeholder="Kwota"
                                                    name="amount"
                                                    value="<?php echo e($oldFormData['amount'] ?? ''); ?>" />
                                            </div>
                                            <div>
                                                <?php if (array_key_exists('amount', $errors)) : ?>
                                                    <div class="text-white">
                                                        <?php echo e($errors['amount'][0]); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                    </svg>
                                                </span>
                                                <input
                                                    type="date"
                                                    class="form-control form-control border-start-0"
                                                    name="date"
                                                    value="<?php echo e($oldFormData['date'] ?? ''); ?>" />
                                            </div>
                                            <div>
                                                <?php if (array_key_exists('date', $errors)) : ?>
                                                    <div class="text-white">
                                                        <?php echo e($errors['date'][0]); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-caret-down" viewBox="0 0 16 16">
                                                        <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                                                    </svg>
                                                </span>
                                                <select class="custom-select form-control border-start-0" id="inputGroupSelect02" name="income_type">
                                                    <option value="" selected disabled hidden>Wybierz rodzaj przychodu</option>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?= htmlspecialchars($category['id']) ?>"
                                                            <?= (isset($oldFormData['income_type']) && $oldFormData['income_type'] == $category['id']) ? 'selected' : '' ?>>
                                                            <?= htmlspecialchars($category['name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div>
                                                <?php if (array_key_exists('income_type', $errors)) : ?>
                                                    <div class="text-white">
                                                        <?php echo e($errors['income_type'][0]); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-card-heading" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                                        <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </span>
                                                <input
                                                    type="text"
                                                    class="form-control border-start-0"
                                                    placeholder="Komentarz"
                                                    name="description"
                                                    value="<?php echo e($oldFormData['description'] ?? ''); ?>" />
                                            </div>
                                            <div>
                                                <?php if (array_key_exists('description', $errors)) : ?>
                                                    <div class="text-white">
                                                        <?php echo e($errors['description'][0]); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-5 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include $this->resolve("partials/_footer.php") ?>

</body>

</html>