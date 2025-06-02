<?php include 'app/views/shares/header.php'; ?>

<style>
    .gradient-blue {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7db9e8 100%);
    }
    .card-blue {
        background: rgba(0, 40, 85, 0.8);
        backdrop-filter: blur(10px);
    }
    .btn-blue {
        background-color: #1e88e5;
        border-color: #1e88e5;
        color: white;
    }
    .btn-blue:hover {
        background-color: #1565c0;
        border-color: #1565c0;
    }
    .form-control-user {
        border-radius: 2rem;
        padding: 1rem 1.5rem;
    }
</style>

<section class="vh-100 gradient-blue">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card card-blue text-white" style="border-radius: 1rem; border: none;">
                    <div class="card-body p-5">
                        <!-- Error Messages -->
                        <?php if(isset($errors)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach($errors as $err): ?>
                                        <li><?= htmlspecialchars($err) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form class="user" action="/webbanhang/account/save" method="post">
                            <div class="text-center mb-5">
                                <h2 class="fw-bold text-uppercase">Create Account</h2>
                                <p class="text-white-50">Please fill in your details</p>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                           id="username" name="username" 
                                           placeholder="Username" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user"
                                           id="fullname" name="fullname" 
                                           placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" name="password" 
                                           placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="confirmpassword" name="confirmpassword" 
                                           placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div class="form-group text-center mb-4">
                                <button type="submit" class="btn btn-blue btn-lg px-5 py-3 w-100">
                                    Register Now
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-white">Already have an account? 
                                    <a href="/webbanhang/account/login" class="text-white fw-bold">Login here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>