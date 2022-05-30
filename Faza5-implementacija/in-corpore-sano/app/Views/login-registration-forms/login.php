<!-- Mia Vucinic 0224/2019 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/css/styles-login-register.css">

    <title>LogIn</title>
</head>

<body style="background-color: #e9f1d0;">
<section class="vh-100" style="background-color: #e9f1d0;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px; background-color: #d3e58a;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                                <?php if (session()->get('success')): ?>
                                    <div class="alert alert-success round" role="alert">
                                        <?= session()->get('success') ?>
                                    </div>
                                <?php endif; ?>

                                <form class="mx-1 mx-md-4" id="loginform"
                                      action="/" method="post">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" id="usernameLogIn" class="form-control" required value="<?= set_value('username') ?>"/>
                                            <label class="form-label" for="usernameLogIn">Username</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" id="passwordLogIn" class="form-control" required/>
                                            <label class="form-label" for="passwordLogIn">Password</label>
                                        </div>
                                    </div>

                                    <?php  if (isset($validation)): ?>

                                    <div class="alert alert-danger round" role="alert" id="alertlogin">
                                        <?= $validation->listErrors() ?>
                                    </div>

                                    <?php endif; ?>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                                style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;"
                                                id="buttonLogIn" name="buttonLogIn">
                                            LogIn
                                        </button>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-center">
                                        Don't have an account?&nbsp;<a href="/register">Sign Up</a>
                                    </div>

                                </form>

                            </div>

                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="/assets/images/logo/logo.png" class="img-fluid" alt="Sample image"
                                     style="margin:auto;width:70%">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>




