<?php include 'action/pages/employeeList.php'; ?>
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
                                <h4 class="card-title mb-2">Employee List</h4>
                                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="card-tabs mt-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#allEmp" role="tab">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#driver" role="tab">Driver</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#onSite" role="tab">On-Site</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#workFromHome" role="tab">Work-From-Home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addEmp" role="tab">Add Employee</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body tab-content p-0">
                            <div class="tab-pane active show fade" id="allEmp" role="tabpanel">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-lg" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>User Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                            <?php
                                            $no = 0;
                                            while($result = $getEmp->fetch_assoc()){
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $result['first_name'] ?></td>
                                                    <td><?php echo $result['last_name'] ?></td>
                                                    <td><?php echo $result['address'] ?></td>
                                                    <td><?php echo $result['contact'] ?></td>
                                                    <td><?php echo $result['userStatus'] ?></td>
                                                    <td><?php echo $result['userRole'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#allEmp<?php echo $no ?>">
                                                            <i class="flaticon-062-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#archiveEmp<?php echo $no ?>">
                                                            <i class="flaticon-089-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                include 'pages/component/allEmpModal.php';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="driver" role="tabpanel">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-lg" id="myTable2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th>User Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> 

                                                <?php
                                                $no = 0;
                                                while($result = $getEmpDriver->fetch_assoc()){
                                                    $no++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $result['first_name'] ?></td>
                                                        <td><?php echo $result['last_name'] ?></td>
                                                        <td><?php echo $result['address'] ?></td>
                                                        <td><?php echo $result['contact'] ?></td>
                                                        <td><?php echo $result['userStatus'] ?></td>
                                                        <td><?php echo $result['userRole'] ?></td>
                                                        <td>
                                                            <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#driverEmp<?php echo $no ?>">
                                                                <i class="flaticon-062-pencil"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#archiveDriverEmp<?php echo $no ?>">
                                                                <i class="flaticon-089-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    include 'pages/component/driverEmpModal.php';
                                                }
                                                ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>    
                            <div class="tab-pane" id="onSite" role="tabpanel">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-lg" id="myTable3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th>User Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> 

                                            <?php
                                            $no = 0;
                                            while($result = $getEmpOnSite->fetch_assoc()){
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $result['first_name'] ?></td>
                                                    <td><?php echo $result['last_name'] ?></td>
                                                    <td><?php echo $result['address'] ?></td>
                                                    <td><?php echo $result['contact'] ?></td>
                                                    <td><?php echo $result['userStatus'] ?></td>
                                                    <td><?php echo $result['userRole'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#onSiteEmp<?php echo $no ?>">
                                                            <i class="flaticon-062-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#archiveOnSiteEmp<?php echo $no ?>">
                                                            <i class="flaticon-089-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                include 'pages/component/onSiteEmpModal.php';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="workFromHome" role="tabpanel">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-lg" id="myTable4">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th>User Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> 

                                            <?php
                                            $no = 0;
                                            while($result = $getEmpWorkFromHome->fetch_assoc()){
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $result['first_name'] ?></td>
                                                    <td><?php echo $result['last_name'] ?></td>
                                                    <td><?php echo $result['address'] ?></td>
                                                    <td><?php echo $result['contact'] ?></td>
                                                    <td><?php echo $result['userStatus'] ?></td>
                                                    <td><?php echo $result['userRole'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#wfhEmp<?php echo $no ?>">
                                                            <i class="flaticon-062-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" title="Move To Archive"  data-bs-toggle="modal" data-bs-target="#archiveWfhEmp<?php echo $no ?>">
                                                            <i class="flaticon-089-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                include 'pages/component/wfhEmpModal.php';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="tab-pane" id="addEmp" role="tabpanel">

                            </div> -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
       