<?php include 'action/pages/pendingTask.php'; ?>
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
                        <h4 class="card-title mb-2">Pending Progress</h4>
                        <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
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
                                    <th>Area No</th>
                                    <th>Picture No</th>
                                    <th>Batch</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    $no = 0;
                                    while($pendingT = $getAllPending->fetch_assoc()){
                                        ++$no;
                                        ?>
                                            <tr>
                                                <td><?php echo $pendingT['orderNo']?></td>
                                                <td><?php echo $pendingT['firstName']." ".$pendingT['lastName']?></td>
                                                <td><?php echo $pendingT['wigModel']?></td>
                                                <td><?php echo $pendingT['areaNo']?></td>
                                                <td><?php echo $pendingT['pictureNo']?></td>
                                                <td><?php echo $pendingT['batchName']?></td>
                                                <td><?php echo $pendingT['picStatus']?></td>
                                                <td><?php echo $pendingT['dateCreated']?></td>
                                                <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $no?>">Update</button></td>
                                            </tr>

                                                                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="updateModal<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3>Order No: <?php echo $pendingT['orderNo']?></h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="../../<?php echo $pendingT['picture']?>" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#updateModal2<?php echo $no?>" name="reject">Reject</button>
                                                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?php echo $pendingT['wigPicId']?>" name="wigPic">
                                                                <input type="hidden" value="<?php echo $pendingT['orderNo']?>" name="orderNo">
                                                                <button type="submit" class="btn btn-success" name="approve">Approve</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="updateModal2<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3>Order No: <?php echo $pendingT['orderNo']?></h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="../../<?php echo $pendingT['picture']?>" alt="" class="img-fluid">
                                                                 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                                                                <textarea name="rejectMsg" class="form-control shadow-md" placeholder="Add Reason" required id="" ></textarea>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <input type="hidden" value="<?php echo $pendingT['wigPicId']?>" name="wigPic">
                                                                <input type="hidden" value="<?php echo $pendingT['userId']?>" name="userId">
                                                                <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                                                             </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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