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
                            ADMIN  &nbsp; &nbsp;
                            <?php 
                              if($allChatAdmin['noAdmin'] != 0 && $allChatAdmin['noAdmin'] != null){
                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $allChatAdmin['noAdmin']?></span> <?php
                              }
                            ?>
                          </button>
                        </h2>
                        <div id="adminContacts" class="accordion-collapse collapse" aria-labelledby="adminCon" data-bs-parent="#adminContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($admin = $getAdminCon->fetch_assoc()){
                                      $adminId = $admin['user_id'];
                                      $selCountAdmin = $conn->query("SELECT count(*) as myMsg from messages where status = 0 and msg_from = '$adminId' and msg_to = '$isLoginUserId'")->fetch_assoc();
                                        ?>
                                        <li class="mb-2">
                                            <a href="?chat&user=<?php echo $admin['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $admin['image']?>" width="30" alt="" class="rounded-circle"/>
                                                <span class="nav-text fw-bold"><?php echo $admin['first_name'].' '.$admin['last_name']?></span>
                                              <?php
                                              if($selCountAdmin['myMsg'] != 0 && $selCountAdmin['myMsg'] != null){
                                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $selCountAdmin['myMsg']?></span> <?php
                                              }
                                              ?>
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
                  <?php if($_SESSION['user_role'] === 'ur1'){?>
                    <div class="accordion accordion-flush" id="empContact">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="empCon">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empContacts" aria-expanded="true" aria-controls="empContacts">
                            EMPLOYEE &nbsp; &nbsp;
                            <?php 
                              if($allChatEmp['noEmp'] != 0 && $allChatEmp['noEmp'] != null){
                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $allChatEmp['noEmp']?></span> <?php
                              }
                            ?>
                          </button>
                        </h2>
                        <div id="empContacts" class="accordion-collapse collapse show" aria-labelledby="empCon" data-bs-parent="#empContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($employee = $getEmpCon->fetch_assoc()){
                                      $empId = $employee['user_id'];
                                      $selCountEmp = $conn->query("SELECT count(*) as myMsg from messages where status = 0 and msg_from = '$empId' and msg_to = '$isLoginUserId'")->fetch_assoc();
                                        ?>
                                        <li class="mb-2 header-profile">
                                            <a href="?chat&user=<?php echo $employee['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $employee['image']?>" width="30" alt="" class="rounded-circle" />
                                                <span class="nav-text fw-bold"><?php echo $employee['first_name'].' '.$employee['last_name']?></span>
                                                <?php
                                              if($selCountEmp['myMsg'] != 0 && $selCountEmp['myMsg'] != null){
                                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $selCountEmp['myMsg']?></span> <?php
                                              }
                                              ?>
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
                            Driver &nbsp; &nbsp;
                            <?php 
                              if($allChatDriver['noDriver'] != 0 && $allChatDriver['noDriver'] != null){
                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $allChatDriver['noDriver']?></span> <?php
                              }
                            ?>
                          </button>
                        </h2>
                        <div id="driverContacts" class="accordion-collapse collapse" aria-labelledby="driverCon" data-bs-parent="#driverContact">
                          <div class="accordion-body">
                            <ul>
                                <?php
                                    while($driver = $getDriverCon->fetch_assoc()){
                                      $driverId = $driver['user_id'];
                                      $selCountDriver= $conn->query("SELECT count(*) as myMsg from messages where status = 0 and msg_from = '$driverId' and msg_to = '$isLoginUserId'")->fetch_assoc();
                                        ?>
                                        <li class="mb-2">
                                            <a href="?chat&user=<?php echo $driver['username']?>" aria-expanded="false" class="mx-3 d-flex gap-2 align-items-center">
                                                <img src="../../<?php echo $driver['image']?>" width="30" alt="" class="rounded-circle" />
                                                <span class="nav-text fw-bold"><?php echo $driver['first_name'].' '.$driver['last_name']?></span>
                                                <?php
                                              if($selCountDriver['myMsg'] != 0 && $selCountDriver['myMsg'] != null){
                                                ?> <span class="badge light text-white bg-primary rounded-circle float-end"><?php echo $selCountDriver['myMsg']?></span> <?php
                                              }
                                              ?>
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
                  <?php } ?>
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
                              $updateChat = $conn->query("UPDATE messages set status = 1 where msg_from = '$chatUserId' and msg_to = '$isLoginUserId'");

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