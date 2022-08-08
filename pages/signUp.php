<?php 
// require 'session/session.php';
require 'action/signup.php';
?>
<!-- Start Sign UP Content -->
<div class="container signup-section mb-5 col-lg-6 shadow-lg animate__animated animate__tada animate__delay-3s">
    <div class="container p-2">
        <div class="card-body">
        <div class="col-6 mx-auto">
            <img 
                src="../img/logo2.png" 
                alt="logo"
                class="img-fluid"
                >
            <h3 class="text-center">Create a new account</h3>
        </div>
            <!-- Error Message -->
            <?php include 'helpers/errorMessage.php'; ?>
            <!-- End -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" novalidate>
                <div class="mb-3 row">
                    <div class="col-lg-4 mb-3">
                        <label for="firstName" class="form-label signup-label">First Name</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="firstName" 
                        id="firstName" 
                        aria-describedby="firstNameId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="middleName" class="form-label signup-label">Middle Name</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="middleName" 
                        id="middleName" 
                        aria-describedby="middleNameId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="lastName" class="form-label signup-label">Last Name</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="lastName" 
                        id="lastName" 
                        aria-describedby="lastNameId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-lg-6 mb-3">
                        <label for="gender" class="form-label signup-label">Gender</label>
                        <select name="gender" id="gender" class="form-select signup-input">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="dateOfBirth" class="form-label signup-label">Date of Birth</label>
                        <input 
                        type="date" 
                        class="form-control signup-input" 
                        name="dateOfBirth" 
                        id="dateOfBirth" 
                        aria-describedby="dateOfBirthId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-lg-6 mb-3">
                        <label for="address" class="form-label signup-label">Address</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="address" 
                        id="address" 
                        aria-describedby="addressId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label signup-label">Email</label>
                        <input 
                        type="email" 
                        class="form-control signup-input" 
                        name="email" 
                        id="email" 
                        aria-describedby="emailId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-lg-6 mb-3">
                        <label for="username" class="form-label signup-label">Username</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="username" 
                        id="username" 
                        aria-describedby="usernameId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="password" class="form-label signup-label">Password</label>
                        <input 
                        type="password" 
                        class="form-control signup-input" 
                        name="password" 
                        id="password" 
                        aria-describedby="passwordId" 
                        placeholder="Type here..."
                        required
                        >
                    </div>
                </div>


                <div class="d-grid gap-2 my-3">
                    <button 
                    type="submit" 
                    name="login" 
                    id="login" 
                    class="btn primary-btn"
                    >Signup</button>
                </div>

                <p class="text-center fw-bold">Already have an account? Click <a href="?login">here</a> to log in!</p>
            </form>
        </div>
    </div>
</div>

<script src="../js/formValidation.js"></script>