<!-- Modal -->
<div class="modal fade" id="allEmp<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Employee Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
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
                    <div class="row">
                        <div class="mb-3 col-6">
                        <label for="empStatus" class="form-label">Status</label>
                        <select class="form-select" name="empStatus" id="empStatus">
                            <option>New Delhi</option>
                            <option>Istanbul</option>
                            <option>Jakarta</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

