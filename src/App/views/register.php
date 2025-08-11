<?php include $this->resolve("partials/_header.php") ?>

<main id="rejestracja">
    <section class="pt-3 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px; background-color: rgba(0, 0, 0, 0.2);">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-0">Rejestracja</p>
                                    <form class="mx-1 mx-md-4" method="post">
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                </span>
                                                <input type="text" id="form3Example1c" class="form-control border-start-0" placeholder="Login" name="nick"
                                                    value="">
                                            </div>

                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                                    </svg>
                                                </span>
                                                <input type="email" id="form3Example3c" class="form-control border-start-0" placeholder="Adres Email" name="email"
                                                    value="">
                                            </div>

                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M8 1a4 4 0 0 0-4 4v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-1V5a4 4 0 0 0-4-4zm-3 4a3 3 0 1 1 6 0v3H5V5zm3 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </span>
                                                <input type="password" id="form3Example4c" class="form-control border-start-0" placeholder="Hasło" name="haslo1"
                                                    value="">
                                            </div>

                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" viewBox="0 0 16 16">
                                                        <path d="M8 1a4 4 0 0 0-4 4v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-1V5a4 4 0 0 0-4-4zm-3 4a3 3 0 1 1 6 0v3H5V5zm3 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </span>
                                                <input type="password" id="form3Example4c" class="form-control border-start-0" placeholder="Powtórz Hasło" name="haslo2"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-5 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" data-callback='onSubmit' data-action='submit'>Zarejestruj</button>
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