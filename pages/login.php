
<div class="container login-section">
    <div class="card login-container shadow-lg p-5">
        <div class="card-title">
            <h2>ArtNature: Libmanan Production Management</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    <h4>Welcome</h4>
                    <img 
                        src="../img/logo.png" 
                        alt="logo"
                        class="img-fluid"
                        >
                    </div>
                </div>
                <div class="col-lg-7 ">
                    <div class="container p-4">
                        <form action="" class="pt-2 needs-validation p3" novalidate>
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
                            <div class="mb-3">
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
                            class="btn login-input primary-btn"
                            >Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>