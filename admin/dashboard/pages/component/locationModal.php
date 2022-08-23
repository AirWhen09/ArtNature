<!-- Modal -->
<div class="modal fade" id="loc<?php echo $location['location_id']  ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <!-- <h5 class="modal-title">Employee Information</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation">
                <div class="modal-body">

                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control text-center" name="address" id="address" placeholder="type here..." value="<?php echo $location['address']?>" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please input reference code.
                      </div>
                    </div>

                </div>
                <input type="hidden" name="locationId" value="<?php echo $location['location_id'] ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateLocation">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteLoc<?php echo $location['location_id']  ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Confirm delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                   
                    <div class="mb-3">
                      <label for="refName" class="form-label">Delete</label>
                      <input type="text" class="form-control text-center" name="refName" readonly id="refName" placeholder="type here..." value="<?php echo $location['address']?>" required>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                     <input type="hidden" name="locId" value="<?php echo $location['location_id'] ?>">
                    <button type="submit" name="removeLocation" class="btn btn-primary">Confirm</button>
                 </form>
            </div>
        </div>
    </div>
</div>

