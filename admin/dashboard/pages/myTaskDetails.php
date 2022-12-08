<?php include 'action/pages/myTaskDetails.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2>Order No: <?php echo $result['order_no'] ?> </h2>
                    <h3 class="text-center">as of <?php echo date('F d, Y', strtotime($today)) ?> estimated progress: <br> <span class="fw-bold badge bg-success"><?php echo $estimatedProgress?>%</span></h3>
                </div>
                <div class="card-body">
                    <div class="invoice-card-row mb-3 mx-1">
                        <div class="bg-warnings invoice-card shadow-lg rounded">
                            <div class="p-3">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <span class="text-white fs-18 fw-bold">Task Progress</span>
                                        
                                    </div>
                                </div>
                                <?php

                                ?>
                                <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                    <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $totalProgreess?>%; height:20px;" role="progressbar">
                                        <?php 
                                            if($totalProgreess > 0){
                                                ?>
                                                    <span><?php echo $totalProgreess?>% Complete</span>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="invoice-card-row mb-3 mx-1" onmouseover="showUpdatePic('showMe1')" onmouseout="hideUpdatePic('showMe1')">
                                
                                <div class="bg-warnings invoice-card shadow-lg rounded">
                                <div class="float-end" style="margin-right: 1rem; margin-top:5px;">
                                    <?php 
                                        $taskId = $result['order_no'];
                                        $selArea1 = $conn->query("SELECT count(*) as area from wig_picture where task_id = '$taskId' and area_no = 'area_i' and pic_status = 'Rejected'")->fetch_assoc();
                                        echo $selArea1['area'] > 0 ? '<label for="" class="badge bg-warnings float-end text-red">'.$selArea1['area'].'</label>' : '';
                                    ?>
                                </div>
                                    <div class="text-center bg-white d-none container-fluid" id="showMe1" style="position:absolute; cursor: pointer; background-color: white" data-bs-toggle="modal" data-bs-target="#myTaskAreaI">
                                        <h4 class="text-center mt-2 p-2" > Update Area I </h4>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column">
                                                <span class="text-white fs-18 fw-bold">AREA I</span>
                                                
                                            </div>
                                        </div>
                                        <?php
                                        


                                        ?>
                                        <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                            <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $area1?>%; height:20px;" role="progressbar">
                                                <?php 
                                                    if($area1 > 0){
                                                        ?>
                                                            <span><?php echo $area1?>% Complete</span>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="invoice-card-row mb-3 mx-1" onmouseover="showUpdatePic('showMe2')" onmouseout="hideUpdatePic('showMe2')">
                                
                                <div class="bg-warnings invoice-card shadow-lg rounded">
                                <div class="float-end" style="margin-right: 1rem; margin-top:5px;">
                                    <?php 
                                        $taskId = $result['order_no'];
                                        $selArea2 = $conn->query("SELECT count(*) as area from wig_picture where task_id = '$taskId' and area_no = 'area_ii' and pic_status = 'Rejected'")->fetch_assoc();
                                        echo $selArea2['area'] > 0 ? '<label for="" class="badge bg-warnings float-end text-red">'.$selArea2['area'].'</label>' : '';
                                    ?>
                                </div>
                                    <div class="text-center bg-white d-none container-fluid" id="showMe2" style="position:absolute; cursor: pointer; background-color: white" data-bs-toggle="modal" data-bs-target="#myTaskAreaII">
                                        <h4 class="text-center mt-2 p-2" > Update AREA II </h4>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column">
                                                <span class="text-white fs-18 fw-bold">AREA II</span>
                                                
                                            </div>
                                        </div>
                                        <?php

                                        ?>
                                        <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                            <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $area2?>%; height:20px;" role="progressbar">
                                                <?php 
                                                    if($area2 > 0){
                                                        ?>
                                                            <span><?php echo $area2?>% Complete</span>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="invoice-card-row mb-3 mx-1" onmouseover="showUpdatePic('showMe3')" onmouseout="hideUpdatePic('showMe3')">
                                
                                <div class="bg-warnings invoice-card shadow-lg rounded">
                                <div class="float-end" style="margin-right: 1rem; margin-top:5px;">
                                    <?php 
                                        $taskId = $result['order_no'];
                                        $selArea3 = $conn->query("SELECT count(*) as area from wig_picture where task_id = '$taskId' and area_no = 'area_iii' and pic_status = 'Rejected'")->fetch_assoc();
                                        echo $selArea3['area'] > 0 ? '<label for="" class="badge bg-warnings float-end text-red">'.$selArea3['area'].'</label>' : '';
                                    ?>
                                </div>
                                    <div class="text-center bg-white d-none container-fluid" id="showMe3" style="position:absolute; cursor: pointer; background-color: white" data-bs-toggle="modal" data-bs-target="#myTaskAreaIII">
                                        <h4 class="text-center mt-2 p-2" > Update Area III </h4>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column">
                                                <span class="text-white fs-18 fw-bold">AREA III</span>
                                                
                                            </div>
                                        </div>
                                        <?php
                                        


                                        ?>
                                        <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                            <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $area3?>%; height:20px;" role="progressbar">
                                            <?php 
                                                    if($area3 > 0){
                                                        ?>
                                                            <span><?php echo $area3?>% Complete</span>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="invoice-card-row mb-3 mx-1" onmouseover="showUpdatePic('showMe4')" onmouseout="hideUpdatePic('showMe4')">
                                
                                <div class="bg-warnings invoice-card shadow-lg rounded">
                                <div class="float-end" style="margin-right: 1rem; margin-top:5px;">
                                    <?php 
                                        $taskId = $result['order_no'];
                                        $selArea4 = $conn->query("SELECT count(*) as area from wig_picture where task_id = '$taskId' and area_no = 'area_iv' and pic_status = 'Rejected'")->fetch_assoc();
                                        echo $selArea4['area'] > 0 ? '<label for="" class="badge bg-warnings float-end text-red">'.$selArea4['area'].'</label>' : '';
                                    ?>
                                </div>
                                    <div class="text-center bg-white d-none container-fluid" id="showMe4" style="position:absolute; cursor: pointer; background-color: white" data-bs-toggle="modal" data-bs-target="#myTaskAreaIV">
                                        <h4 class="text-center mt-2 p-2" > Update Area IV </h4>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column">
                                                <span class="text-white fs-18 fw-bold">AREA IV</span>
                                                
                                            </div>
                                        </div>
                                        <?php
                                        


                                        ?>
                                        <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                            <div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $area4?>%; height:20px;" role="progressbar">
                                            <?php 
                                                    if($area4 > 0){
                                                        ?>
                                                            <span><?php echo $area4?>% Complete</span>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php include 'pages/component/myTaskModalDetails.php' ?>

<script>
    function showUpdatePic(x) {
        document.getElementById(x).classList.remove("d-none");
    }

    function hideUpdatePic(x) {
        document.getElementById(x).classList.add("d-none");
    }
</script>