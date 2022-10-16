<?php include 'action/pages/taskHistory.php'; ?>
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
                        <h2 class="card-title mb-2 ">Order Number: <span class="fw-bold"><?php echo $getHistory['orderNumber']?></span></h2>
                        <h2 class="card-title mb-2 ">Wig Size: <span class="fw-bold"><?php echo $getHistory['wigSize']?></span></h2>
                        <h2 class="card-title mb-2 ">Wig Model: <span class="fw-bold"><?php echo $getHistory['wigModel']?></span></h2>
                    </div>
                    <div class="me-3">
                        <h2 class="card-title mb-2 ">Batch Name: <span class="fw-bold"><?php echo $getHistory['batchName']?></span></h2>
                        <h2 class="card-title mb-2 ">Date Created: <span class="fw-bold"><?php echo date('F d, Y h:mA', strtotime($getHistory['dateCreated']))?></span></h2>
                        <h2 class="card-title mb-2 ">Status: <span class="fw-bold"><?php echo $getHistory['wigStatus']?></span></h2>
                    </div>
                </div>
                <div class="row my-2 mx-2">
                        <h2 class="card-title mb-2 ">Description: <span class="fw-bold"><?php echo $getHistory['descriptions']?></span></h2>
                    </div>
                <div class="row mx-3">
                        <?php
                            $days = [];
                            date_default_timezone_set('Asia/Manila');
                            $today = date('Y-m-d');
                            $noOfDays = $getHistory['noOfDays'];
                            $percent = 100/$noOfDays;
                            $progress = 0;
                            $startDate = $getHistory['startDate'];
                            $i = 0;
                            while($i < $noOfDays){
                                $progress += $percent;
                                $addDate = date('F d, Y', strtotime($startDate. ' + '.$i.' day'));
                                array_push($days, date('Y-m-d', strtotime($startDate. ' + '.$i.' day')));
                                ?>
                                    <div class="col-sm-2 mx-auto bg-warning card p-3 text-center">
                                        <h4 class="text-white"><?php echo $addDate ?></h4>
                                        <h5 class="text-white">Estimated Progress: <span class="fw-bold"><?php echo number_format($progress, 0); ?>%</span></h5>
                                    </div>
                                <?php
                                $i++;
                            }
                        ?>
                      
                </div>
                <div class="card-body tab-content p-0">  
                    <div class="table-responsive p-3">
                        <table class="table table-responsive-lg" id="myTable3">
                            <thead>
                                <tr>
                                    <th>Date Created</th>
                                    <th>Image</th>
                                    <th>Area</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                while($result = $getHistorys->fetch_assoc()){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo date('F d, Y h:mA', strtotime($result['historyDate'])) ?></td>
                                        <td>
                                            <img src="../../<?php echo $result['wigImage'] ?>" class="img-fluid" width="300" alt="">
                                        </td>
                                        <td><?php echo $result['areaNo'] ?></td>
                                        <td><?php echo $result['taskProgress'] ?>%</td>
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