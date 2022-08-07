
<div class="container login-section mb-5 shadow-lg">
    <div class="container p-5">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    <h4>Welcome to <b class="wig-logo">Art<span>Nature<span>.</span></span></b></h4>
                    <img 
                        src="../img/logo2.png" 
                        alt="logo"
                        class="img-fluid"
                        >
                    <p>Manufacturing and sales of wigs and hairpieces; provision of haircare and Hair -addition products and services; sale of haircare products</p>
                    </div>
                </div>
                <div class="col-lg-7 ">
                    <div class="container p-4">
                        <form action="../admin/dashboard/index.html" method="GET" class="pt-2 needs-validation p3">
                            <div class="mb-3">
                                <label for="username" class="form-label login-label">Username</label>
                                <input 
                                type="text" 
                                class="form-control login-input" 
                                name="username" 
                                id="username" 
                                aria-describedby="usernameId" 
                                placeholder="Type here..."
                                required>
                                <small id="usernameId" class="form-text text-muted"></small>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label login-label">Password</label>
                                <input 
                                type="password" 
                                class="form-control login-input" 
                                name="password" 
                                id="password" 
                                aria-describedby="passwordId" 
                                placeholder="Type here..."
                                required>
                                <small id="passwordId" class="form-text text-muted"></small>
                            </div>
                            <div class="d-grid gap-2">
                                <button 
                                type="submit" 
                                name="login" 
                                id="login" 
                                class="btn login-btn"
                                >Login</button>
                            </div>
                            <div class="d-flex flex-column justify-content-center item-content-center mt-2">
                                <p class="text-center fw-bold">or</p>
                                <p class="text-center fw-bold">Don't have an account yet? <a href="#">Sign up instead</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>