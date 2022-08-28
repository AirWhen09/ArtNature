<!-- Modal -->
<div class="modal fade" id="task<?php echo $result['order_no'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: <?php echo $result['order_no'] ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" >
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

                        ?>
                        <h2 class="text-center">Estimated Progress: <span class="fw-bold badge bg-success"><?php echo $estimatedProgress?>%</span></h2>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <h4 class="text-center">Model: <span class="fw-bold"><?php echo $result['wigModel'] ?></span></h4>
                            </div>
                            <div class="col-6">
                                <h4 class="text-center">Size: <span class="fw-bold"><?php echo $result['wigSize'] ?></span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <h1 class="text-center text-primary"><span id="processStatus1<?php echo $result['order_no'] ?>"><?php echo $result['process']?></span>%</h1>
                            <input type="range" name="process" id="<?php echo $result['order_no'] ?>" onchange="myProcess1(this)" class="form-range myProcess" max="100" value="<?php echo $result['process']?>" >
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
