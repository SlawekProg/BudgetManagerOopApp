<?php include $this->resolve("partials/_header.php"); ?>

<main id="stronaUzytkownika">
    <section>
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold text-body-emphasis">Witaj <?php echo htmlspecialchars($_SESSION['username']); ?> w Panelu Użytkownika</h1>
            <div class="col-lg-6 mx-auto mt-4">
                <p class="lead mb-4 fs-5 fw-bold">Dziękujemy za skorzystanie z naszej aplikacji budżetowej. Dzięki niej możesz w prosty i przejrzysty sposób zarządzać swoimi finansami osobistymi.</p>
                <p class="lead fs-5 fw-bold">Pamiętaj — dobra organizacja to podstawa zdrowych finansów.
                    Zacznij działać już teraz i zobacz, jak Twoje oszczędności rosną z dnia na dzień.</p>
            </div>
        </div>
    </section>
</main>

<?php include $this->resolve("partials/_footer.php"); ?>