<?php include 'action/pages/myTask.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
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
                                                    if($result['start_date'] != '' && $result['process'] != 100){
                                                ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?taskDetail&orderNo=<?php echo $result['order_no'] ?>">Update</a>
                                                <?php 
                                                    }else{
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
                                                <button class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myNewTask<?php echo $result['order_no'] ?>">Update</button>
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