<?php include $this->resolve("partials/_header.php"); ?>

<main id="logowanie">
    <section class="pt-3 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px; background-color: rgba(0, 0, 0, 0.2);">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-0">Logowanie</p>
                                    <form class="mx-1 mx-md-4" method="POST">
                                        <?php include $this->resolve('partials/_csrf.php'); ?>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                </span>
                                                <input
                                                    type="email"
                                                    class="form-control border-start-0"
                                                    placeholder="Email"
                                                    name="email"
                                                    value="" />
                                            </div>
                                            <?php if (array_key_exists('email', $errors)): ?>
                                                <div class="text-white">
                                                    <?php echo e($errors['email'][0]); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M8 1a4 4 0 0 0-4 4v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-1V5a4 4 0 0 0-4-4zm-3 4a3 3 0 1 1 6 0v3H5V5zm3 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </span>
                                                <input
                                                    type="password"
                                                    class="form-control border-start-0"
                                                    placeholder="Hasło"
                                                    name="password" />
                                            </div>
                                            <?php if (array_key_exists('password', $errors)): ?>
                                                <div class="text-white">
                                                    <?php echo e($errors['password'][0]); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-center mt-5 mb-lg-4">
                                            <button class="btn btn-primary btn-lg" type="submit">Login</button>
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

<?php include $this->resolve("partials/_footer.php"); ?>
</body>

</html>