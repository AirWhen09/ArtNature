<!-- Modal -->
<div class="modal fade" id="ref<?php echo $reference['ref_id']  ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <!-- <h5 class="modal-title">Employee Information</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation">
                <div class="modal-body">
                    <div class="mb-3">
                      <label for="refCode" class="form-label">Reference Code</label>
                      <input type="text" class="form-control text-center" name="refCodes" readonly id="refCode" placeholder="type here..." value="<?php echo $reference['ref_id']?>" required>
                      <div class="valid-feedback">
                         
                      </div>
                      <div class="invalid-feedback">
                        Please input reference code.
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="refName" class="form-label">Reference Name</label>
                      <input type="text" class="form-control text-center" name="refName" id="refName" placeholder="type here..." value="<?php echo $reference['name']?>" required>
                      <div class="valid-feedback">
                         
                      </div>
                      <div class="invalid-feedback">
                        Please input reference name.
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="refRanking" class="form-label">Ranking</label>
                      <input type="number" class="form-control text-center" name="refRanking" id="refRanking" placeholder="type here..." value="<?php echo $reference['ranking']?>" required>
                      <div class="valid-feedback">
                         
                      </div>
                      <div class="invalid-feedback">
                        Please input reference ranking.
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <input type="text" class="form-control text-center" name="description" id="description" placeholder="type here..." value="<?php echo $reference['description']?>" required>
                      <div class="valid-feedback">
                         
                      </div>
                      <div class="invalid-feedback">
                        Please input description.
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="groupName" class="form-label">Group Name</label>
                      <input type="text" class="form-control text-center" name="groupName" id="groupName" readonly placeholder="type here..." value="<?php echo $reference['group_name']?>" required>
                      <div class="valid-feedback">
                         
                      </div>
                      <div class="invalid-feedback">
                        Please input Group Name.
                      </div>
                    </div>

                </div>
                <input type="hidden" name="refCode" value="<?php echo $reference['ref_id'] ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateRef">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteRef<?php echo $reference['ref_id']  ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Confirm delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                     <div class="mb-3">
                      <label for="refCode" class="form-label">Reference Code</label>
                      <input type="text" class="form-control text-center" name="refCodes" readonly id="refCode" placeholder="type here..." value="<?php echo $reference['ref_id']?>" required>                    </div>

                    <div class="mb-3">
                      <label for="refName" class="form-label">Reference Name</label>
                      <input type="text" class="form-control text-center" name="refName" readonly id="refName" placeholder="type here..." value="<?php echo $reference['name']?>" required>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                     <input type="hidden" name="refId" value="<?php echo $reference['ref_id'] ?>">
                    <button type="submit" name="removeRef" class="btn btn-primary">Confirm</button>
                 </form>
            </div>
        </div>
    </div>
</div>

