<!-- Modal -->
<div class="modal fade" id="myTask<?php echo $result['order_no'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: <?php echo $result['order_no'] ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation">
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
                        <div class="row mb-4">
                            <h1 class="text-center text-primary"><span id="processStatus2<?php echo $result['order_no'] ?>"><?php echo $result['process']?></span>%</h1>
                            <input type="range" name="process" id="<?php echo $result['order_no'] ?>" onchange="myProcess2(this)" class="form-range myProcess" max="100" value="<?php echo $result['process']?>" >
                        </div>
                        
                        <div class="mx-3">
                        <div class="col-lg-6 mx-auto mt-3">
                            <img 
                            src="../../img/profile/avatar.png" 
                            alt="avatar"
                            class="img-fluid"
                            id="img<?php echo $result['order_no'] ?>s"
                            >
                        </div>
                          <label for="" class="form-label text-center">Upload Picture</label>
                        <input type="file" name="image" id="img<?php echo $result['order_no'] ?>" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile(event)" class="form-control p-3" required>
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

<script>
    function loadfile(event){
        let imgId = event.target.id + 's';
        var output=document.getElementById(imgId);
        output.src=URL.createObjectURL(event.target.files[0]);
    };
</script>