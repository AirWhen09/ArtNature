<?php include 'action/pages/taskBatch.php'; ?>
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
                        <h4 class="card-title mb-2"><?php echo $batch?></h4>
                    </div>
                </div>
                <div class="card-body tab-content p-0">
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
            </div>
        </div>
    </div>
</div>