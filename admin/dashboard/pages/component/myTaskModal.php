<!-- Modal -->
<div class="modal fade" id="myTask<?php echo $result['order_no'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: <?php echo $result['order_no'] ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h4 class="text-center">Model: <span class="fw-bold"><?php echo $result['wigModel'] ?></span></h4>
                            </div>
                            <div class="col-6">
                                <h4 class="text-center">Size: <span class="fw-bold"><?php echo $result['wigSize'] ?></span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <h1 class="text-center text-primary"><span id="processStatus2<?php echo $result['order_no'] ?>"><?php echo $result['process']?></span>%</h1>
                            <input type="range" name="process" id="<?php echo $result['order_no'] ?>" onchange="myProcess2(this)" class="form-range myProcess" max="100" value="<?php echo $result['process']?>" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderNo" value="<?php echo $result['order_no'] ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="myTask">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

