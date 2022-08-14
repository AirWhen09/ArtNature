<!-- Modal -->
<div class="modal fade" id="allEmp<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Employee Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-5 mx-auto mb-2">
                            <img src="../../<?php echo $result['image'] ?>" alt="" class="img-fluid rounded-circle border-primary border-2">
                        </div>
                        <h3 class="text-center"><?php echo $result['first_name'].' '.$result['last_name'] ?></h3>
                        <div class="text-center">
                            <span class="text-center text-muted"><?php echo $result['email'] ?></span><br>
                            <span class="text-center text-muted"><?php echo $result['contact'] ?></span><br>
                            <span class="text-center text-muted"><?php echo $result['address'] ?></span><br>
                            <span class="text-center text-muted">DOB: <?php echo date('F d, Y', strtotime($result['birthday'])); ?></span><br>
                        </div>
                        <div class="row mt-2">
                            <?php
                                $empId = $result['user_id'];
                                $getDoneTask = $conn->query("SELECT count(order_no) as done from tasks where user_id = '$empId' and status = 'tstts3'")->fetch_assoc();
                                $getOnGoingTask = $conn->query("SELECT count(order_no) as onGoing from tasks where user_id = '$empId' and status = 'tstts2'")->fetch_assoc();
                            ?>
                            <div class="mb-3 col-6">
                            <label class="form-label fw-bold">Completed Task</label>
                            <input type="text" value="<?php echo $getDoneTask['done'] ?>" readonly
                                class="form-control text-center" placeholder="">
                            </div>
                            <div class="mb-3 col-6">
                            <label class="form-label fw-bold">On Going Task</label>
                            <input type="text" value="<?php echo $getOnGoingTask['onGoing'] ?>" readonly
                                class="form-control text-center" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="empStatus" class="form-label fw-bold">Status</label>
                                <select class="form-select" name="empStatus" id="empStatus">
                                    <?php
                                    //get employee status
                                    $empStatus = "SELECT ref_id, name from reference_code where group_name = 'ustts'";
                                    $getEmpStatus = $conn->query($empStatus);
                                    while($status = $getEmpStatus->fetch_assoc()){
                                        if($status['ref_id'] == $result['status']){
                                            $selectedStat = 'Selected';
                                        }else{
                                            $selectedStat = '';
                                        }
                                        ?>
                                        <option 
                                        value="<?php echo $status['ref_id'] ?>"
                                        <?php echo $selectedStat ?>
                                        >
                                            <?php echo $status['name'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                            <label for="empUserRole" class="form-label fw-bold">Position</label>
                                <select class="form-select" name="empUserRole" id="empUserRole">
                                    <?php
                                    //get employee status
                                    $empUserRole = "SELECT ref_id, name from reference_code where group_name = 'ur'";
                                    $getempUserRole = $conn->query($empUserRole);
                                    while($uRole = $getempUserRole->fetch_assoc()){
                                        if($uRole['ref_id'] == $result['user_role']){
                                            $selecteduRole = 'Selected';
                                        }else{
                                            $selecteduRole = '';
                                        }
                                        ?>
                                        <option 
                                        value="<?php echo $uRole['ref_id'] ?>"
                                        <?php echo $selecteduRole ?>
                                        >
                                            <?php echo $uRole['name'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="empId" value="<?php echo $result['user_id'] ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateEmp">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="archiveEmp<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Move to archived?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-5 mx-auto mb-2">
                        <img src="../../<?php echo $result['image'] ?>" alt="" class="img-fluid rounded-circle border-primary border-2">
                    </div>
                        <h3 class="text-center"><?php echo $result['first_name'].' '.$result['last_name'] ?></h3>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                     <input type="hidden" name="empId" value="<?php echo $result['user_id'] ?>">
                    <button type="submit" name="empArchive" class="btn btn-primary">Confirm</button>
                 </form>
            </div>
        </div>
    </div>
</div>

