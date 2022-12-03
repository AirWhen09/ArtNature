<?php include 'action/pages/myTask.php'; ?>
<?php include 'pages/validation/helpers.php'?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
            <div class="card p-5">
                <div class="row">
                <?php
                 $allTask2 = "SELECT *, b.name as taskStatus , 
                            c.first_name as firstName, 
                            c.last_name as lastName,
                            c.image as imagePath,
                            e.name as wigModel,
                            f.name as wigSize,
                            a.user_id as userId,
                            g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                where a.status in ('tstts2') and a.user_id = '$isLoginUserId'
                ";
            $getTask2 = $conn->query($allTask2);
                    while($task = $getTask2->fetch_assoc()){
                        $orderNo = $task['order_no'];
                        
                    ?>
                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <a href="index.php?taskHistory&or=<?php echo $task['order_no']?>">
                            <div class="bg-warning invoice-card shadow-lg rounded mb-2">
                                <div class="p-3">
                                    <div class="d-flex">
                                        <div class="icon me-3">
                                            <img src="../../<?php echo $task['imagePath']?>" alt="image" class="rounded-circle border-3 border border-white" height="100px">
                                        </div> 
                                        <div class="d-flex flex-column">
                                            <span class="text-white fs-18 fw-bold"><?php echo $task['firstName'].' '.$task['lastName']?></span>
                                            
                                            <span class="text-white fs-10"><?php echo $task['userRole']?></span>
                                            <span class="text-white fs-10">or #: <b><?php echo $task['order_no']?></b></span>
                                        </div>
                                    </div>
                                    <div class="progress default-progress my-2" style="outline: #ffffff solid 3px; box-shadow: none">
                                        <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $task['process']?>%; height:20px;" role="progressbar">
                                            <span><?php echo $task['process']?>%</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-evenly">
                                        <span class="text-white fs-18">Model: <b><?php echo $task['wigModel']?></b></span>
                                        <span class="text-white fs-18">Size: <b><?php echo $task['wigSize']?></b></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-block d-sm-flex border-0">
                    <div class="me-3">
                        <h4 class="card-title mb-2">My Task List</h4>
                        <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                    </div>
                    <div class="card-tabs mt-3 mt-sm-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#allTask" role="tab">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#newTask" role="tab">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#doneTask" role="tab">Done</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content p-0">
                    <div class="tab-pane active show fade" id="allTask" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable5">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Wig Model</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    while($result = $getTask->fetch_assoc()){
                                        if($result['imagePath'] == ''){
                                            $imagePath = "img/profile/avatar.png";
                                        }else{
                                            $imagePath = $result['imagePath'];
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <a class="text-success" href="index.php?taskHistory&or=<?php echo $result['order_no'] ?>"><?php echo $result['order_no'] ?></a>
                                            </td>
                                            <td>
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
                                                <span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                            </td>
                                            <td><?php echo $result['taskStatus'] ?></td>
                                            <td>
                                                <?php
                                                    if($result['process'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['process'].'%';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['start_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['end_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['end_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] != '' && $result['process'] != 100 && $result['taskStatus'] != 'Archived' && $result['taskStatus'] != 'Damage'){
                                                ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?taskDetail&orderNo=<?php echo $result['order_no'] ?>">Update</a>
                                                <?php 
                                                    }elseif($result['taskStatus'] == 'Archived' || $result['taskStatus'] == 'Damage'){echo '';}else{
                                                    ?>
                                                    <button class="btn btn-success btn-sm">Done</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                            // include 'pages/component/myTaskModal.php';
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="newTask" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable4">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Wig Model</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    while($result = $getAllNewTask->fetch_assoc()){
                                        if($result['imagePath'] == ''){
                                            $imagePath = "img/profile/avatar.png";
                                        }else{
                                            $imagePath = $result['imagePath'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $result['order_no'] ?></td>
                                            <td>
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
                                                <span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                            </td>
                                            <td><?php echo $result['taskStatus'] ?></td>
                                            <td>
                                                <?php
                                                    if($result['process'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['process'].'%';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['start_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['end_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['end_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] != '' && $result['process'] != 100 && $result['taskStatus'] != 'tstts4'){
                                                ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?taskDetail&orderNo=<?php echo $result['order_no'] ?>">Update</a>
                                                <?php 
                                                    }elseif($result['taskStatus'] == 'tstts4'){}else{
                                                    ?>
                                                    <button class="btn btn-success btn-sm">Done</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        include 'pages/component/myNewTaskModal.php';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    <div class="tab-pane" id="doneTask" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable3">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Wig Model</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    while($result = $getAllDoneTask->fetch_assoc()){
                                        if($result['imagePath'] == ''){
                                            $imagePath = "img/profile/avatar.png";
                                        }else{
                                            $imagePath = $result['imagePath'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $result['order_no'] ?></td>
                                            <td>
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
                                                <span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                            </td>
                                            <td><?php echo $result['taskStatus'] ?></td>
                                            <td>
                                                <?php
                                                    if($result['process'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['process'].'%';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['start_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['end_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['end_date'];
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->