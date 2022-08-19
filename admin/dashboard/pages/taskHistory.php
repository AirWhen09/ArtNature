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
                        <h2 class="card-title mb-2 ">Date Created: <span class="fw-bold"><?php echo $getHistory['dateCreated']?></span></h2>
                        <h2 class="card-title mb-2 ">Status: <span class="fw-bold"><?php echo $getHistory['wigStatus']?></span></h2>
                    </div>
                </div>
                <div class="card-body tab-content p-0">  
                    <div class="table-responsive p-3">
                        <table class="table table-responsive-lg" id="myTable3">
                            <thead>
                                <tr>
                                    <th>Date Created</th>
                                    <th>Image</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                while($result = $getHistorys->fetch_assoc()){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $result['historyDate'] ?></td>
                                        <td>
                                            <img src="../../<?php echo $result['wigImage'] ?>" class="img-fluid" width="300" alt="">
                                        </td>
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