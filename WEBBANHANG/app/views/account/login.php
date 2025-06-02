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
</style>

<section class="vh-100 gradient-blue">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card card-blue text-white" style="border-radius: 1rem; border: none;">
                    <div class="card-body p-5 text-center">
                        <form action="/webbanhang/account/checklogin" method="post">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-4 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login credentials</p>
                                
                                <div class="form-outline form-white mb-4">
                                    <input type="text" 
                                           name="username" 
                                           class="form-control form-control-lg"
                                           placeholder=" " />
                                    <label class="form-label">Username</label>
                                </div>
                                
                                <div class="form-outline form-white mb-4">
                                    <input type="password" 
                                           name="password" 
                                           class="form-control form-control-lg"
                                           placeholder=" " />
                                    <label class="form-label">Password</label>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="#!" class="text-white-50">Forgot password?</a>
                                </div>
                                
                                <button class="btn btn-blue btn-lg px-5 w-100 mb-3" type="submit">
                                    Login
                                </button>
                                
                                <p class="text-white-50 mb-3">Or sign in with:</p>
                                
                                <div class="d-flex justify-content-center text-center">
                                    <a href="#!" class="text-white me-4">
                                        <i class="fab fa-facebook-f fa-lg"></i>
                                    </a>
                                    <a href="#!" class="text-white me-4">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a href="#!" class="text-white">
                                        <i class="fab fa-google fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="pt-3">
                                <p class="mb-0 text-white">
                                    Don't have an account? 
                                    <a href="/webbanhang/account/register" class="text-white fw-bold">Sign Up</a>
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