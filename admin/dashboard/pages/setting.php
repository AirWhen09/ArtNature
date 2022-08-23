<?php include 'action/pages/setting.php'; ?>
<?php include 'action/setting.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
             <!-- Error Message -->
             <?php include '../../helpers/errorMessage.php'; ?>
                <!-- End -->
            <div class="card">
                <div class="card-header d-block d-sm-flex border-0">
                    <div class="me-3">
                        <h4 class="card-title mb-2">Setting</h4>
                        <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                    </div>
                    <div class="card-tabs mt-3 mt-sm-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#allRef" role="tab">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#location" role="tab">Location</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content p-0">
                    <div class="tab-pane active show fade" id="allRef" role="tabpanel">
                        <div class="row">
                            <div class="p-3">
                                <button class="btn btn-success float-end mx-3 btn-sm" data-bs-toggle="modal" data-bs-target="#addRef">add new</button>
                            </div>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable1">
                                <thead>
                                    <tr>
                                        <th>Reference Code</th>
                                        <th>Name</th>
                                        <th>Ranking</th>
                                        <th>Description</th>
                                        <th>Group Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    $allReference = "SELECT * from reference_code";
                                    $getReference = $conn->query($allReference);
                                    while($reference = $getReference->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $reference['ref_id'] ?></td>
                                            <td><?php echo $reference['name'] ?></td>
                                            <td><?php echo $reference['ranking'] ?></td>
                                            <td><?php echo $reference['description'] ?></td>
                                            <td><?php echo $reference['group_name'] ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#ref<?php echo $reference['ref_id'] ?>">
                                                    <i class="flaticon-062-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#deleteRef<?php echo $reference['ref_id'] ?>">
                                                    <i class="flaticon-089-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        include 'pages/component/referenceModal.php';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="location" role="tabpanel">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable2">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    $allLocation = "SELECT * from location";
                                    $getLocation = $conn->query($allLocation);
                                    $no = 0;
                                    while($location = $getLocation->fetch_assoc()){
                                        ++$no;
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $location['address'] ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#loc<?php echo $location['location_id'] ?>">
                                                    <i class="flaticon-062-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#deleteLoc<?php echo $location['location_id'] ?>">
                                                    <i class="flaticon-089-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        include 'pages/component/locationModal.php';
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

<!-- Modal -->
<div class="modal fade" id="addRef" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Add reference code</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" novalidate>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="addSelect" class="form-label">Add</label>
                            <select class="form-select" name="addSelect" id="addSelect" required>
                                <option value="">Select</option>
                                <?php
                                    while($groupName = $getGroupName->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $groupName['group_name']?>"><?php echo $groupName['description']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                          <label for="refCode" class="form-label">Reference Code</label>
                          <input type="text"
                            class="form-control" name="refCode" id="refCode" placeholder="type here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text"
                            class="form-control" name="name" id="name" placeholder="type here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                          <label for="ranking" class="form-label">Ranking</label>
                          <input type="number"
                            class="form-control" name="ranking" id="ranking" placeholder="type here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <input type="text"
                            class="form-control" name="description" id="description" placeholder="type here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="saveNewRef" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--**********************************
    Content body end
***********************************-->