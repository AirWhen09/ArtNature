<?php include 'action/pages/progressReport.php'; ?>
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
                        <h4 class="card-title mb-2">Progress Report</h4>
                        <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                    </div>
                    <div class="card-tabs mt-3 mt-sm-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#dailyProgress" role="tab">Daily Progress Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#taskBatch" role="tab">Task Batch</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content p-0">
                    <div class="tab-pane active show fade" id="dailyProgress" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable2">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Employee Name</th>
                                        <th>Wig Model</th>
                                        <th>Status</th>
                                        <th>Progress</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    while($result = $getProgress->fetch_assoc()){
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
                                                if($result['taskStatus'] == 'New'){
                                                    $badge = "badge badge-warning";
                                                }elseif($result['taskStatus'] == 'Production'){
                                                    $badge = "badge badge-danger";
                                                }elseif($result['taskStatus'] == 'Done'){
                                                    $badge = "badge badge-success";
                                                }elseif($result['taskStatus'] == 'Archived'){
                                                    $badge = "badge badge-secondary";
                                                }
                                            ?>
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
                    <div class="tab-pane" id="taskBatch" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable5">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Batch Name</th>
                                        <th>Number of task</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    $no = 0;
                                    while($batch = $getAllBatch->fetch_assoc()){
                                        ++$no;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $no ?>
                                            </td>
                                            <td>
                                                <a href="index.php?batch=<?php echo $batch['batchName'] ?>" class="text-primary">
                                                  <?php echo $batch['batchName'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $batch['numOfTask'] ?>
                                            </td>
                                            <?php 
                                                if($batch['batchStatus'] == 'bstts1'){
                                                    $badge = "badge badge-warning";
                                                }elseif($batch['batchStatus'] == 'bstts2'){
                                                    $badge = "badge badge-danger";
                                                }elseif($batch['batchStatus'] == 'bstts3'){
                                                    $badge = "badge badge-success";
                                                }elseif($batch['batchStatus'] == 'bstts4'){
                                                    $badge = "badge badge-secondary";
                                                }

                                                $batchStat = $conn->query("SELECT name from reference_code where ref_id = '".$batch['batchStatus']."'")->fetch_assoc();
                                            ?>
                                            <td>
                                                <?php
                                                    
                                                        $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status != 'tstts4' and a.batch = '".$batch['batchId']."'";
                                                        $getAve = $conn->query($aveProcess)->fetch_assoc();
                                                        if($getAve['totalAve'] == ''){
                                                            echo '0%';
                                                        }else{
                                                            echo $getAve['totalAve'].'%';
                                                            
                                                        }
                                                        
                                                  
                                                ?>
                                            </td>
                                            <td><span class="<?php echo $badge ?>"><?php echo $batchStat['name'] ?></span></td>
                                            
                                            <td>
                                                <?php
                                                    echo date('F d, Y', strtotime($batch['dateCreated']));
                                                ?>
                                            </td>
                                            <td>  
                                                <a class="btn btn-warning"  title="Print" href="pages/pdf/batchReport.php?batch=<?php echo $batch['batchId']?>" target="_BLANK">
                                                    <i class="flaticon-381-print"></i>
                                                </a>
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