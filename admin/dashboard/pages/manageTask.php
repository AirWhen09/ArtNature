<?php include 'action/pages/manageTask.php'; ?>
<?php include 'action/addNewTask.php'; ?>
<?php include 'action/assignEmployee.php'; ?>
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
                    <div class="card">
                        <div class="card-header d-block d-sm-flex border-0">
                            <div class="me-3">
                                <h4 class="card-title mb-2">Manage Task</h4>
                                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="card-tabs mt-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#taskList" role="tab">Task List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addTask" role="tab">Add Task</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#assignTask" role="tab">Assign Task</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body tab-content p-0">
                            <div class="tab-pane active show fade" id="taskList" role="tabpanel">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-lg" id="myTable5">
                                        <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>Employee Name</th>
                                                <th>Wig Model</th>
                                                <th>Batch</th>
                                                <th>Status</th>
                                                <th>Progress</th>
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
                                                        <div class="user-bx">
                                                            <img src="../../<?php echo $imagePath ?>" alt="">
                                                            <div>
                                                                <h6 class="user-name">
                                                                    <?php
                                                                        if($result['firstName'] == '' and $result['lastName'] == ''){
                                                                            echo 'Unassigned';
                                                                        }else{
                                                                            echo $result['firstName']." ".$result['lastName'];
                                                                        }
                                                                    ?>
                                                                </h6>
                                                                <span class="meta"><?php echo $result['userRole'] ?></span>
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
														<span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                                    </td>
                                                    <?php 
                                                        if($result['taskStat'] == 'tstts1'){
                                                            $badge = "badge badge-warning";
                                                        }elseif($result['taskStat'] == 'tstts2'){
                                                            $badge = "badge badge-danger";
                                                        }elseif($result['taskStat'] == 'tstts3'){
                                                            $badge = "badge badge-success";
                                                        }elseif($result['taskStat'] == 'tstts4'){
                                                            $badge = "badge badge-secondary";
                                                        }
                                                    ?>
                                                    <td><?php echo $result['batchName'] ?></td>
                                                    <td><span class="<?php echo $badge ?>"><?php echo $result['taskStatus'] ?></span></td>
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
                                                                echo date('F d, Y', strtotime($result['start_date']));
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($result['end_date'] == ''){
                                                                echo "N/A";
                                                            }else{
                                                                echo date('F d, Y', strtotime($result['end_date']));
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>  
                                                        <?php
                                                            if($result['start_date'] != ''){
                                                                // if($result['start_date'] != '' && $result['process'] != 100){
                                                                ?>
                                                                    <button class="btn btn-warning btn-sm"  title="Edit" data-bs-toggle="modal" data-bs-target="#task<?php echo $result['order_no'] ?>">
                                                                        <i class="flaticon-062-pencil"></i>
                                                                    </button>
                                                                <?php
                                                            }
                                                        ?>
                                                        <button class="btn btn-danger btn-sm"  title="Move To Archive" data-bs-toggle="modal" data-bs-target="#arcTask<?php echo $result['order_no'] ?>">
                                                            <i class="flaticon-089-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                include 'pages/component/taskModal.php';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="addTask" role="tabpanel">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-7 mx-auto mb-5">
                                            <h4 class="text-center">Add New Task</h4>
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  class="needs-validation" novalidate>

                                                <div class="mb-3">
                                                  <label for="batchName" class="fw-bold">Batch Name</label>
                                                  <select name="batchName" id="batchName" class="form-select" onChange="taskBatchName(this)" required>
                                                    <option value="">Select Batch</option>
                                                    <?php
                                                    while($batch = $getAllBatch->fetch_assoc()){
                                                        ?>
                                                            <option value="<?php echo $batch['batch_id']; ?>"><?php echo $batch['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    <option value="new">Add new</option>
                                                  </select>
                                                  <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please select batch.
                                                    </div>
                                                </div>

                                                <div class="mb-3 collapse" id="addBatch">
                                                  <label for="addNewBatch" class="fw-bold">Add Batch</label>
                                                  <input type="text" value="<?php echo !empty($inputs['addNewBatch']) ? $inputs['addNewBatch'] : ""?>" 
                                                  class="form-control" name="addNewBatch" id="addNewBatch" aria-describedby="helpId" placeholder="type here..." >
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input batch name.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                  <label for="orderNumber" class="fw-bold">Order Number</label>
                                                  <input type="text" value="<?php echo !empty($inputs['orderNumber']) ? $inputs['orderNumber'] : ""?>"
                                                    class="form-control" name="orderNumber" id="orderNumber" aria-describedby="helpId" placeholder="type here..." required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input order number.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                  <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="wigModel" class="fw-bold">Wig Model</label>
                                                        <select class="form-select" name="wigModel" id="wigModel" required>
                                                            <option value="">Select Model</option>
                                                            <?php
                                                            while($wigModel = $getWigModel->fetch_assoc()){
                                                                ?>
                                                                    <option value="<?php echo $wigModel['ref_id']; ?>"><?php echo $wigModel['name']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please select wig model.
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="wigSize" class="fw-bold">Wig Size</label>
                                                        <select class="form-select" name="wigSize" id="wigSize" required>
                                                            <option value="">Select Size</option>
                                                            <?php
                                                            while($wigSize = $getWigSize->fetch_assoc()){
                                                                ?>
                                                                    <option value="<?php echo $wigSize['ref_id']; ?>"><?php echo $wigSize['name']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please select wig size.
                                                        </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>

                                                <div class="mb-3">
                                                  <label for="description" class="fw-bold">Description</label>
                                                  <textarea class="form-control" name="description" id="description" placeholder="type here..." rows="3" 
                                                   required><?php echo !empty($inputs['description']) ? $inputs['description'] : ""?></textarea>
                                                   <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input description.
                                                    </div>
                                                </div>

                                                <div class="d-grid gap-2 mb-4">
                                                  <button type="submit" name="addTask" id="addTask" class="btn btn-primary">Add Task</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="assignTask" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="table-responsive container">
                                            <h4 class="text-center">List of new task</h4>
                                            <table class="table" id="myTable1">
                                                <thead>
                                                    <tr>
                                                        <th>Order #</th>
                                                        <th>Wig</th>
                                                        <th>Date Created</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 

                                                    <?php
                                                    while($result = $getAllNewTask->fetch_assoc()){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $result['order_no'] ?></td>
                                                            <td>
                                                                <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
                                                                <span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                                            </td>
                                                            <td><?php echo $result['date_created'] ?></td>
                                                            <td>
                                                            
                                                            <span class="badge badge-success"><?php echo $result['taskStatus'] ?></span>
                                                            </td>
                                                            
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>    
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="container">
                                            <h4 class="text-center">Assigning Employee</h4>
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"  class="needs-validation" novalidate>
                                                <div class="mb-3">
                                                    <label for="employee" class="fw-bold">Employee</label>
                                                    <select class="form-select" name="employee" id="employee" required>
                                                    <option value="">Select Employee</option>
                                                    <?php
                                                    while($employee = $getEmployee->fetch_assoc()){
                                                        ?>
                                                            <option value="<?php echo $employee['user_id']; ?>"><?php echo $employee['fullname']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please select employee.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="orderNo" class="fw-bold">Select Task</label>
                                                    <select class="form-select" name="orderNo" id="orderNo" required>
                                                    <option value="">Select Order #</option>
                                                    <?php
                                                    while($newTask = $getNewTask->fetch_assoc()){
                                                        ?>
                                                            <option value="<?php echo $newTask['order_no']; ?>"><?php echo $newTask['order_no']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please select order number.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="startDate" class="fw-bold">Start Date</label>
                                                    <input type="datetime-local" min="<?php echo date('Y-m-d');?>T00:00" onchange="setEndDateMin(this)"
                                                    class="form-control" name="startDate" id="startDate" aria-describedby="helpId" placeholder="type here..." required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input start date.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="endDate" class="fw-bold">End Date</label>
                                                    <input type="datetime-local" min="<?php echo date('Y-m-d');?>T00:00" disabled
                                                    class="form-control" name="endDate" id="endDate" aria-describedby="helpId" placeholder="type here..." required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input end date.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message" class="fw-bold">Message</label>
                                                    <textarea class="form-control" name="message" id="message" placeholder="type here..." rows="3" required></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please input message.
                                                    </div>
                                                </div>
                                                
                                                <div class="d-grid gap-2 mb-4">
                                                    <button type="submit" name="assignEmployee" id="assignEmployee" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
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
       <script>
        function taskBatchName(x){
            let batchName = x.value;
            let newBatch = document.getElementById('addBatch');
            let newBatchInputBox = document.getElementById('addNewBatch');
            if(batchName === 'new'){
                newBatch.classList.remove('collapse');
                newBatchInputBox.setAttribute('required', '');
            }else{
                newBatch.classList.add('collapse');
                newBatchInputBox.removeAttribute('required');
            }
           
        }

        function setEndDateMin(me){
            let min = me.value;
            let newBatch = document.getElementById('endDate');
            newBatch.removeAttribute('disabled');
            newBatch.setAttribute('min', min);
        }
       </script>