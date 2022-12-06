<?php 
// require 'session/session.php';
include 'action/signup.php';
?>
<!-- Start Sign UP Content -->
<div class="container signup-section mb-5 col-md-10 shadow-lg animate__animated animate__bounceInUp animate__delay-3s">
    <div class="container p-2">
        <div class="card-body">
        <div class=" mx-auto">
            <!-- <img 
                src="img/logo2.png" 
                alt="logo"
                class="img-fluid"
                > -->
            <h3 class="text-center">Create a new account at<span class="wig-logo"> Art<span>Nature<span>.</span></span></span></h3>
        </div>
            <!-- Error Message -->
            <?php include 'helpers/errorMessage.php'; ?>
            <!-- End -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" enctype="multipart/form-data" novalidate>
                <div class="mb-3 row">
                    <div class="col-lg-4">
                        <div class="col-lg-6 mx-auto">
                            <img 
                            src="img/avatar.png" 
                            alt="avatar"
                            class="img-fluid"
                            id="imagess"
                            >
                        </div>
                        <div class="col-lg-10 mx-auto">
                            <input type="file" name="image" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile(event)" class="form-control mt-4">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="firstName" class="form-label signup-label">First Name</label>
                                <input 
                                type="text" 
                                class="form-control signup-input" 
                                name="firstName" 
                                id="firstName" 
                                aria-describedby="firstNameId" 
                                placeholder="Type here..."
                                required
                                value="<?php echo !empty($inputs['firstName']) ? $inputs['firstName'] : ""?>"
                                >
                                <div class="valid-feedback">
                                     
                                </div>
                                <div class="invalid-feedback">
                                    Please input first name.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="middleName" class="form-label signup-label">Middle Name</label>
                                <input 
                                type="text" 
                                class="form-control signup-input" 
                                name="middleName" 
                                id="middleName" 
                                aria-describedby="middleNameId" 
                                placeholder="Type here..."
                                value="<?php echo !empty($inputs['middleName']) ? $inputs['middleName'] : ""?>"
                                >

                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="lastName" class="form-label signup-label">Last Name</label>
                                <input 
                                type="text" 
                                class="form-control signup-input" 
                                name="lastName" 
                                id="lastName" 
                                aria-describedby="lastNameId" 
                                placeholder="Type here..."
                                required
                                value="<?php echo !empty($inputs['lastName']) ? $inputs['lastName'] : ""?>"
                                >
                                <div class="valid-feedback">
                                     
                                </div>
                                <div class="invalid-feedback">
                                    Please input last name.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="gender" class="form-label signup-label">Gender</label>
                                    <select name="gender" id="gender" class="form-select signup-input" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="valid-feedback">
                                     
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select gender.
                                    </div>
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
                                value="<?php echo !empty($inputs['dateOfBirth']) ? $inputs['dateOfBirth'] : ""?>"
                                >
                                <div class="valid-feedback">
                                     
                                </div>
                                <div class="invalid-feedback">
                                    Please input date of birth.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="contact" class="form-label signup-label">Contact #</label>
                                <input 
                                type="number" 
                                class="form-control signup-input" 
                                name="contact" 
                                id="contact" 
                                aria-describedby="contactId" 
                                placeholder="Type here..."
                                required
                                value="<?php echo !empty($inputs['contact']) ? $inputs['contact'] : ""?>"
                                >
                                <div class="valid-feedback">
                                     
                                </div>
                                <div class="invalid-feedback">
                                    Please input contact number.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row px-4">
                    <div class="col-lg-4 mb-3">
                        <label for="employee" class="form-label signup-label">User Type</label>
                        <select name="employee" id="employee" class="form-select signup-input" required>
                            <option value="">Select</option>
                            <?php 
                            $selectEmpType = $conn->query("SELECT * from reference_code where group_name = 'ur' and ref_id != 'ur1'");

                            while($row = $selectEmpType->fetch_assoc()){
                                $val = $row['ref_id'];
                                $name = $row['name'];
                                echo "<option value='$val'>$name</option>";
                            }
                            ?>    
                        </select>
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please select employee.
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="address" class="form-label signup-label">Address</label>
                        <input 
                        type="text" 
                        class="form-control signup-input" 
                        name="address" 
                        id="address" 
                        aria-describedby="addressId" 
                        placeholder="Type here..."
                        required
                        value="<?php echo !empty($inputs['address']) ? $inputs['address'] : ""?>"
                        >
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input address.
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="email" class="form-label signup-label">Email</label>
                        <input 
                        type="email" 
                        class="form-control signup-input" 
                        name="email" 
                        id="email" 
                        aria-describedby="emailId" 
                        placeholder="Type here..."
                        required
                        value="<?php echo !empty($inputs['email']) ? $inputs['email'] : ""?>"
                        >
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input email.
                        </div>
                    </div>
                </div>

                <div class="mb-3 row px-4">
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
                                value="<?php echo !empty($inputs['username']) ? $inputs['username'] : ""?>"
                        >
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input username.
                        </div>
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
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input password.
                        </div>
                    </div>
                </div>


                <div class="d-grid gap-2 my-3">
                    <button 
                    type="submit" 
                    name="signup" 
                    id="login" 
                    class="btn primary-btn"
                    >Sign Up</button>
                </div>

                <p class="text-center fw-bold">Already have an account? Click <a href="?login">here</a> to log in!</p>
            </form>
        </div>
    </div>
</div>

<script src="js/formValidation.js"></script>
<script>
    function loadfile(event){
				var output=document.getElementById('imagess');
				output.src=URL.createObjectURL(event.target.files[0]);
			};
</script>