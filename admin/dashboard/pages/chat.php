<?php include 'action/pages/chat.php'; ?>
<?php include 'action/chat.php'; ?>
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
            <div class="row">
                <div class="col-lg-3">

                    <div class="accordion accordion-flush" id="adminContact">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="adminCon">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminContacts" aria-expanded="true" aria-controls="adminContacts">
                            ADMIN
                          </button>
                        </h2>
                        <div id="adminContacts" class="accordion-collapse collapse" aria-labelledby="adminCon" data-bs-parent="#adminContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($admin = $getAdminCon->fetch_assoc()){
                                        ?>
                                        <li class="mb-2">
                                            <a href="?chat&user=<?php echo $admin['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $admin['image']?>" width="30" alt="" class="rounded-circle"/>
                                                <span class="nav-text fw-bold"><?php echo $admin['first_name'].' '.$admin['last_name']?></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion accordion-flush" id="empContact">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="empCon">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empContacts" aria-expanded="true" aria-controls="empContacts">
                            EMPLOYEE
                          </button>
                        </h2>
                        <div id="empContacts" class="accordion-collapse collapse show" aria-labelledby="empCon" data-bs-parent="#empContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($employee = $getEmpCon->fetch_assoc()){
                                        ?>
                                        <li class="mb-2 header-profile">
                                            <a href="?chat&user=<?php echo $employee['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $employee['image']?>" width="30" alt="" class="rounded-circle" />
                                                <span class="nav-text fw-bold"><?php echo $employee['first_name'].' '.$employee['last_name']?></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion accordion-flush" id="driverContact">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="driverCon">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#driverContacts" aria-expanded="true" aria-controls="driverContacts">
                            Driver
                          </button>
                        </h2>
                        <div id="driverContacts" class="accordion-collapse collapse" aria-labelledby="driverCon" data-bs-parent="#driverContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($driver = $getDriverCon->fetch_assoc()){
                                        ?>
                                        <li class="mb-2">
                                            <a href="?chat&user=<?php echo $driver['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $driver['image']?>" width="30" alt="" class="rounded-circle" />
                                                <span class="nav-text fw-bold"><?php echo $driver['first_name'].' '.$driver['last_name']?></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="card text-start mh-100">
                      <div class="card-body">
                        <div class="d-flex mb-4 gap-3">
                            <img src="../../<?php echo $image ?>" width="60" class="rounded-circle" alt="">
                            <div>
                                <h4 class="card-title"><?php echo $name ?></h4>
                                <p class="card-text"><?php echo $email ?></p>
                            </div>
                        </div>

                        <?php
                            while($chats = $getAllChat->fetch_assoc()){
                                if($chats['msg_from'] == $isLoginUserId){
                                ?>
                                <!-- right -->
                                <div class="d-flex gap-2 flex-row-reverse">
                                    <div class="card p-4">
                                        <p class="fw-bold"><?php echo $chats['message'] ?></p>
                                        <span class="text-muted"><?php echo date('F d, Y h:mA', strtotime($chats['date_created'])) ?></span>
                                    </div>
                                </div>
                                <?php
                                }else{
                                    ?>
                                    <!-- left  -->
                                    <div class="d-flex gap-2">
                                        <div>
                                            <img src="../../<?php echo $image ?>" width="40" alt="" class="rounded-circle"/>
                                        </div>
                                        <div class="card p-4">
                                            <p class="fw-bold"><?php echo $chats['message'] ?></p>
                                            <span class="text-muted"><?php echo date('F d, Y h:mA', strtotime($chats['date_created'])) ?></span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                        
                

                      </div>
                      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  class="needs-validation" novalidate>
                        <div class="card-footer d-flex">
                            <input type="text" name="message" class="form-control" placeholder="type here..." required>
                            <input type="hidden" name="from" value="<?php echo $isLoginUserId ?>">
                            <input type="hidden" name="to" value="<?php echo $chatUserId ?>">
                            <button type="submit" name="chatMe" <?php echo $dis ?> class="btn btn-secondary btn-sm">Send</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->