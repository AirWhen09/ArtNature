<!-- Modal -->
<div class="modal fade" id="task<?php echo $result['order_no'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: <?php echo $result['order_no'] ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                    <?php
                            $days = [];
                            $today = date('Y-m-d');
                            $noOfDays = $result['no_of_days'];
                            $startDate = $result['start_date'];
                            $estimatedProgress = '';
                            $i = 0;
                            while($i < $noOfDays){
                                array_push($days, date('Y-m-d', strtotime($startDate. ' + '.$i.' day')));
                                $i++;
                            }

                            if($today < $days[0]){
                                $estimatedProgress = 0;
                            }elseif($today > $days[$noOfDays - 1]){
                                $estimatedProgress = 100;
                            }else{
                                if(in_array($today, $days)){
                                    $k = array_search($today, $days);
                                    $progressToday = (100 / $noOfDays) * ($k + 1);
                                    $estimatedProgress = number_format($progressToday, 0);
                                }else{
                                    $estimatedProgress = "something else";
                                }
                            }
                            $wigId = $result['wig_id'];
                            $getArea = $conn->query("SELECT * from wig where wig_id = '$wigId'")->fetch_assoc();

                            $area1 = $getArea['area_i'];
                            $area2 = $getArea['area_ii'];
                            $area3 = $getArea['area_iii'];
                            $area4 = $getArea['area_iv'];
                            $area1Pic = $getArea['area_i_pic'];
                            $area2Pic = $getArea['area_ii_pic'];
                            $area3Pic = $getArea['area_iii_pic'];
                            $area4Pic = $getArea['area_iv_pic'];
                            
                            
                        ?>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h4 class="text-center">Model: <span class="fw-bold"><?php echo $result['wigModel'] ?></span></h4>
                            </div>
                            <div class="col-6">
                                <h4 class="text-center">Size: <span class="fw-bold"><?php echo $result['wigSize'] ?></span></h4>
                            </div>
                        </div>
                        <h3 class="text-center">as of <?php echo date('F d, Y', strtotime($today)) ?> estimated progress: <br> <span class="fw-bold badge bg-success"><?php echo $estimatedProgress?>%</span></h3>
                        <div class="row mb-4">
                            <h1 class="text-center text-primary">Total Progress: <span id="processStatus<?php echo $result['order_no'] ?>"><?php echo $result['process']?></span>%</h1>
                            <!-- <input type="range" name="process" id="<?php //echo $result['order_no'] ?>" onchange="myProcess2(this)" class="form-range myProcess" max="100" value="<?php //echo $result['process']?>" > -->
                        </div>
                        
                        <div class="mx-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="flex flex-column justify-content-center gap-5">
                                        <div class="col-lg-6 mx-auto mt-3">
                                            
                                            <h4 class="text-center">Area 1</h4>
                                            <h4 class="text-center" ><span id="areaProcess1<?php echo $result['order_no'] ?>"><?php echo $area1 != NULL ? $area1 : 0;?></span>% complete</h4>
                                            <input value="<?php echo $area1 != NULL ? $area1 : 0;?>" type="range" name="area1" id="<?php echo $result['order_no'] ?>" onchange="areaProcess1(this)" class="form-range area1<?php echo $result['order_no'] ?>">
                                                <img 
                                                src="<?php echo $area1Pic != NULL ? '../../'.$area1Pic : '../../img/noData.jpg';?>" 
                                                alt="avatar"
                                                class="img-fluid"
                                                id="img1<?php echo $result['order_no'] ?>s1"
                                                >
                                                <input type="file" name="image1" id="img1<?php echo $result['order_no'] ?>" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile1(event)" class="form-control p-3" style="opacity: 0;">
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="flex flex-column justify-content-center gap-5">
                                        <div class="col-lg-6 mx-auto mt-3">
                                            <h4 class="text-center">Area 2</h4>
                                            <h4 class="text-center" ><span id="areaProcess2<?php echo $result['order_no'] ?>"><?php echo $area2 != NULL ? $area2 : 0;?></span>% complete</h4>
                                            <input value="<?php echo $area2 != NULL ? $area2 : 0;?>" type="range" name="area2" id="<?php echo $result['order_no'] ?>" onchange="areaProcess2(this)" class="form-range area2<?php echo $result['order_no'] ?>">
                                                <img 
                                                src="<?php echo $area2Pic != NULL ? '../../'.$area2Pic : '../../img/noData.jpg';?>" 
                                                alt="avatar"
                                                class="img-fluid"
                                                id="img2<?php echo $result['order_no'] ?>s2"
                                                >
                                            <input type="file" name="image2" id="img2<?php echo $result['order_no'] ?>" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile2(event)" class="form-control p-3"  style="opacity: 0;">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="flex flex-column justify-content-center gap-5">
                                        <div class="col-lg-6 mx-auto mt-3">
                                            <h4 class="text-center">Area 3</h4>
                                            <h4 class="text-center" ><span id="areaProcess3<?php echo $result['order_no'] ?>"><?php echo $area3 != NULL ? $area3 : 0;?></span>% complete</h4>
                                            <input value="<?php echo $area3 != NULL ? $area3 : 0;?>" type="range" name="area3" id="<?php echo $result['order_no'] ?>" onchange="areaProcess3(this)" class="form-range area3<?php echo $result['order_no'] ?>">
                                                <img 
                                                src="<?php echo $area3Pic != NULL ? '../../'.$area3Pic : '../../img/noData.jpg';?>" 
                                                alt="avatar"
                                                class="img-fluid"
                                                id="img3<?php echo $result['order_no'] ?>s3"
                                                >
                                            <input type="file" name="image3" id="img3<?php echo $result['order_no'] ?>" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile3(event)" class="form-control p-3" style="opacity: 0;">
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="flex flex-column justify-content-center gap-5">
                                        <div class="col-lg-6 mx-auto mt-3">
                                            <h4 class="text-center">Area 4</h4>
                                            <h4 class="text-center" ><span id="areaProcess4<?php echo $result['order_no'] ?>"><?php echo $area4 != NULL ? $area4 : 0;?></span>% complete</h4>
                                            <input value="<?php echo $area4 != NULL ? $area4 : 0;?>" type="range" name="area4" id="<?php echo $result['order_no'] ?>" onchange="areaProcess4(this)" class="form-range area4<?php echo $result['order_no'] ?>">
                                                <img 
                                                src="<?php echo $area4Pic != NULL ? '../../'.$area4Pic : '../../img/noData.jpg';?>" 
                                                alt="avatar"
                                                class="img-fluid"
                                                id="img4<?php echo $result['order_no'] ?>s4"
                                                >
                                            <input type="file" name="image4" id="img4<?php echo $result['order_no'] ?>" accept=".png, .jpg, .jpeg, .tif" onchange="loadfile4(event)" class="form-control p-3"  style="opacity: 0;">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderNo" value="<?php echo $result['order_no'] ?>">
                    <input type="hidden" name="wigId" value="<?php echo $result['wig_id'] ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="myTask">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="arcTask<?php echo $result['order_no'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Move to archived?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                        <p class="text-center">Order Number</p>
                        <h3 class="text-center"><?php echo $result['order_no'] ?></h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
                     <input type="hidden" name="orderNo" value="<?php echo $result['order_no'] ?>">
                    <button type="submit" name="taskArchive" class="btn btn-primary">Confirm</button>
                 </form>
            </div>
        </div>
    </div>
</div>

<script>
    function processStatus(x){
        let id = "processStatus" + x;
        let area1id = "area1" + x;
        let area2id = "area2" + x;
        let area3id = "area3" + x;
        let area4id = "area4" + x;
        let area1 = document.getElementsByClassName(area1id);
        let area2 = document.getElementsByClassName(area2id);
        let area3 = document.getElementsByClassName(area3id);
        let area4 = document.getElementsByClassName(area4id);

        console.log(area1id);
        console.log(area1);

        let area1Val = area1[0].value,
            area2Val = area2[0].value,
            area3Val = area3[0].value,
            area4Val = area4[0].value;
        

        let total = (parseInt(area1Val) + parseInt(area2Val) + parseInt(area3Val) + parseInt(area4Val)) / 4;
        
        let totalStatus = document.getElementById(id);
        totalStatus.innerText = total;
    }

    function loadfile1(event){
        let imgId = event.target.id + 's1';
        var output=document.getElementById(imgId);
        output.src=URL.createObjectURL(event.target.files[0]);
    };
    function loadfile2(event){
        let imgId2 = event.target.id + 's2';
        var output=document.getElementById(imgId2);
        output.src=URL.createObjectURL(event.target.files[0]);
    };
    function loadfile3(event){
        let imgId3 = event.target.id + 's3';
        var output=document.getElementById(imgId3);
        output.src=URL.createObjectURL(event.target.files[0]);
    };
    function loadfile4(event){
        let imgId4 = event.target.id + 's4';
        var output=document.getElementById(imgId4);
        output.src=URL.createObjectURL(event.target.files[0]);
    };

    function areaProcess1(x){
        let process = "areaProcess1"+x.id;
        document.getElementById(process).innerText = x.value;

        processStatus(x.id);
    }

    function areaProcess2(x){
        let process = "areaProcess2"+x.id;
        document.getElementById(process).innerText = x.value;

        processStatus(x.id);
    }

    function areaProcess3(x){
        let process = "areaProcess3"+x.id;
        document.getElementById(process).innerText = x.value;

        processStatus(x.id);
    }

    function areaProcess4(x){
        let process = "areaProcess4"+x.id;
        document.getElementById(process).innerText = x.value;

        processStatus(x.id);
    }

    function showUpdatePic(x) {
        document.getElementById(x).classList.remove("d-none");
    }

    function hideUpdatePic(x) {
        document.getElementById(x).classList.add("d-none");
    }
</script>