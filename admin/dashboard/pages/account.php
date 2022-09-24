<?php include 'action/pages/account.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
            <!-- Error Message -->
            <?php include '../../helpers/errorMessage.php'; ?>
                <!-- End -->
            <div class="card p-3">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="mb-3 row">
                            <div class="col-lg-4">
                                <div class="col-lg-6 mx-auto">
                                    <img 
                                    src="../../<?php echo !empty($getAccount['image']) ? $getAccount['image'] : "img/avatar.png"?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    >
                                </div>
                                <div class="col-lg-7 mt-2 mx-auto">
                                    <a class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#updatePic">Change</a>
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
                                        value="<?php echo !empty($getAccount['first_name']) ? $getAccount['first_name'] : ""?>"
                                        >
                                        <div class="valid-feedback">
                                            Looks good!
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
                                        value="<?php echo !empty($getAccount['middle_name']) ? $getAccount['middle_name'] : ""?>"
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
                                        value="<?php echo !empty($getAccount['last_name']) ? $getAccount['last_name'] : ""?>"
                                        >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please input last name.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="gender" class="form-label signup-label">Gender</label>
                                            <select name="gender" id="gender" class="form-select signup-input" required>
                                                <option value="">Select Gender</option>
                                                <option 
                                                <?php echo $getAccount['gender'] == "Male" ? "selected" : ""?>
                                                value="Male">Male</option>
                                                <option
                                                <?php echo $getAccount['gender'] == "Female" ? "selected" : ""?>
                                                value="Female">Female</option>
                                            </select>
                                            <div class="valid-feedback">
                                            Looks good!
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
                                        value="<?php echo !empty($getAccount['birthday']) ? $getAccount['birthday'] : ""?>"
                                        >
                                        <div class="valid-feedback">
                                            Looks good!
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
                                        value="<?php echo !empty($getAccount['contact']) ? $getAccount['contact'] : ""?>"
                                        >
                                        <div class="valid-feedback">
                                            Looks good!
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
                                <label for="employee" class="form-label signup-label">Employee</label>
                                <input 
                                type="text" 
                                class="form-control signup-input" 
                                name="address" 
                                id="address" 
                                aria-describedby="addressId" 
                                placeholder="Type here..."
                                required
                                readonly
                                value="<?php echo !empty($getAccount['userRole']) ? $getAccount['userRole'] : ""?>"
                                >
                                <div class="valid-feedback">
                                    Looks good!
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
                                value="<?php echo !empty($getAccount['address']) ? $getAccount['address'] : ""?>"
                                >
                                <div class="valid-feedback">
                                    Looks good!
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
                                value="<?php echo !empty($getAccount['email']) ? $getAccount['email'] : ""?>"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please input email.
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mb-3 row px-4">
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
                                        value="<?php //echo !empty($getAccount['username']) ? $getAccount['username'] : ""?>"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please input username.
                                </div>
                            </div> -->

                            <!-- <div class="col-lg-6 mb-3">
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
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please input password.
                                </div>
                            </div> -->
                        </div>


                        <div class="d-grid gap-2 my-3">
                            <button 
                            type="submit" 
                            name="changeInfo" 
                            id="login" 
                            class="btn btn-primary"
                            >Save Information</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->


<!-- Modal -->
<div class="modal fade" id="updatePic" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Change Profile Picture</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" enctype="multipart/form-data" novalidate>        
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-lg-6 mx-auto">
                            <img 
                            src="../../<?php echo !empty($getAccount['image']) ? $getAccount['image'] : "img/avatar.png"?>" 
                            alt="avatar"
                            class="img-fluid"
                            id="imagess"
                            >
                        </div>
                        <div class="col-lg-10 mx-auto">
                            <input type="file" name="image" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile(event)" class="form-control mt-4" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This fiels is required.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="userId" value="<?php echo $getAccount['user_id'] ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="changePic">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function loadfile(event){
				var output=document.getElementById('imagess');
				output.src=URL.createObjectURL(event.target.files[0]);
			};
</script>