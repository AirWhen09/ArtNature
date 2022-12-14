<?php include 'action/pages/location.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
            <?php 
            if(isset($_GET['batch'])){
                ?>
                <div class="card p-3">
                    <h2>Batch Name: <b><?php echo $_GET['batch']?></b></h2>
                    <div class="row" id="location">
                    <?php
                    //get all location

                    $batchId = $_GET['batch'];
                    $allLocation = "SELECT a.batch_id as batchName,
                                           a.date_created as dateArrived,
                                           CONCAT(b.first_name, ' ', b.last_name) as fullName,
                                           c.address as address
                                           from task_batch_location as a
                                           join users as b on a.user_id = b.user_id 
                                           join location as c on a.location_id = c.location_id 
                                           where a.batch_id = '$batchId'";
                    $getLocation = $conn->query($allLocation);
                    if($getLocation->num_rows > 0){
                        while($location = $getLocation->fetch_assoc()){

                            ?>
                                 <div class="col-xl-3 col-xxl-3 col-sm-6">
                                    <div class="card bg-success invoice-card">
                                        <div class="card-body d-flex">
                                            <div class="icon me-3">
                                                <svg  width="33px" height="32px">
                                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
                                                </svg>
                                            </div>
                                            <div class="d-grid">
                                                <span class="text-white fs-10"><?php echo $location['batchName']?> is currently at <?php echo $location['address']?>, <?php echo $location['dateArrived']?></span>
                                                <span class="text-white fs-10">Driver Name: <b><?php echo $location['fullName']?></b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }

                        $selStat = $conn->query("SELECT status from task_batch where name = '$batchId'")->fetch_assoc();
                        if($selStat['status'] == 'bstts5'){
                            ?>
                                <div class="col-xl-3 col-xxl-3 col-sm-6">
                                    <div class="card bg-success invoice-card">
                                        <div class="card-body d-flex flex-column">
                                            <h1 class="text-center text-white">DELIVERED</h1>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="col-xl-3 col-xxl-3 col-sm-6">
                                    <div class="card bg-success invoice-card">
                                        <div class="card-body d-flex flex-column">
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">

                                                <select name="myLocation" id="myLocation" class="form-select">
                                                    <?php 
                                                        $allLocation = $conn->query("SELECT * FROM location");
                                                        while($location = $allLocation->fetch_assoc()){
                                                            ?>
                                                                <option value="<?php echo $location['location_id']?>"><?php echo $location['address']?></option>
                                                            <?php
                                                        }
                                                    ?> 
                                                
                                                </select>
                                                <input type="hidden" name="batchName" value="<?php echo $batchId ?>">
                                                <button class="btn btn-primary btn-sm mt-2" name="btnLocation" type="submit">Update Location</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                        
                        <?php     
                        }else{
                            $selDriver = $conn->query("SELECT assigned_driver from task_batch where name = '$batchId'")->fetch_assoc();
                            if($isLoginUserId == $selDriver['assigned_driver']){
                              
                            ?>
                                <div class="col-xl-3 col-xxl-3 col-sm-6">
                                    <div class="card bg-success invoice-card">
                                        <div class="card-body d-flex flex-column">
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">

                                                <select name="myLocation" id="myLocation" class="form-select">
                                                    <?php 
                                                        $allLocation = $conn->query("SELECT * FROM location");
                                                        while($location = $allLocation->fetch_assoc()){
                                                            ?>
                                                                <option value="<?php echo $location['location_id']?>"><?php echo $location['address']?></option>
                                                            <?php
                                                        }
                                                    ?> 
                                                
                                                </select>
                                                <input type="hidden" name="batchName" value="<?php echo $batchId ?>">
                                                <button class="btn btn-primary btn-sm mt-2" name="btnLocation" type="submit">Update Location</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }  
                        }
                        ?>
                    
                    
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="card">
                <div class="card-body tab-content p-0">
                    <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable5">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Batch Name</th>
                                        <th>Number of task</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    $no = 0;
                                    while($batch = $getAllBatch->fetch_assoc()){
                                        ++$no;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $no ?>
                                            </td>
                                            <td>
                                                <a href="?location&batch=<?php echo $batch['batchName'] ?>" class="text-primary">
                                                    <?php echo $batch['batchName'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $batch['numOfTask'] ?>
                                            </td>
                                            <?php 
                                                if($batch['batchStatus'] == 'bstts1'){
                                                    $badge = "badge badge-warning";
                                                }elseif($batch['batchStatus'] == 'bstts2'){
                                                    $badge = "badge badge-danger";
                                                }elseif($batch['batchStatus'] == 'bstts3' || $batch['batchStatus'] == 'bstts5'){
                                                    $badge = "badge badge-success";
                                                }elseif($batch['batchStatus'] == 'bstts4'){
                                                    $badge = "badge badge-secondary";
                                                }
                                                $allBatchStat = $conn->query("SELECT name, ref_id from reference_code where group_name = 'bstts' and ref_id != 'bstts1'");
                                                $batchStat = $conn->query("SELECT name, ref_id from reference_code where ref_id = '".$batch['batchStatus']."'")->fetch_assoc();
                                            ?>
                                            <td>
                                                <?php
                                                    
                                                    $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status != 'tstts4' and a.batch = '".$batch['batchId']."'";
                                                    $getAve = $conn->query($aveProcess)->fetch_assoc();
                                                    if($getAve['totalAve'] == ''){
                                                        echo '0%';
                                                    }else{
                                                        $bProgress = $getAve['totalAve'];
                                                        $bId = $batch['batchId'];
                                                        $upBatch = $conn->query("UPDATE task_batch set progress = '$bProgress' where batch_id = '$bId'");
                                                        echo $bProgress.'%';
                                                        
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <span class="<?php echo $badge ?>">
                                                <?php echo $batchStat['name']?> 
                                                <!-- <select name="BatchStat" id="batchStat" class="form-select"> -->
                                                    <?php
                                                       // while($batchList = $allBatchStat->fetch_assoc()){
                                                            ?>
                                                                <!-- <option value="<?php //echo $batchList['ref_id']?>"  -->
                                                                <?php
                                                                    // if($batchStat['name'] === $batchList['name']) echo "selected";
                                                                ?>
                                                                <!-- ><?php //echo $batchList['name']?> </option> -->
                                                            <?php
                                                       // }
                                                    ?>
                                                    
                                                <!-- </select> -->
                                                </span>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                    echo date('F d, Y', strtotime($batch['dateCreated']));
                                                ?>
                                            </td>
                                            <td> 
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                                                <input type="hidden" name="batchName" value="<?php echo $batch['batchName'] ?>">
                                                <button class="btn btn-primary btn-sm batchDelivered" name="batchDelivered" <?php if($batchStat['ref_id'] != "bstts3" || $isLoginUserId != $batch['driver']) echo "disabled";?>>
                                                    Update to Delivered
                                                </button>
                                            </form>
                                            </td>
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
<!--**********************************
    Content body end
***********************************-->

<script>
    function updateLocation(location){
        let locationId = location.id;

        $.ajax({
            url   : 'action/ajax/location.php',
            type  : 'POST',
            dataType: "text",
            data  : {locationId : locationId},
            success : function(data){
                $('#location').html(data);
                alert("Location Updated!");
            }
        });
    }
</script>