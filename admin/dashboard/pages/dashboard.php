<?php include 'action/pages/dashboard.php'; ?>
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
				<div class="row invoice-card-row">
					<select name="batchName" id="batchName" class="form-select w-50 mx-2 mb-3">
						<option value="">Select Batch</option>
						<?php
						while($batch = $getBatch->fetch_assoc()){
						?>
						<option value="<?php echo $batch['batch_id']?>"><?php echo $batch['name']?></option>
						<?php		
						}
						?>
					</select>
					<div class="col-sm-8">
							
						<div id="task" class="row ">
							<div class="invoice-card-row mb-3 mx-1">
								<div class="bg-warning invoice-card shadow-lg rounded">
									<div class="p-3">
										<div class="d-flex">
											<div class="d-flex flex-column">
												<span class="text-white fs-18 fw-bold">All task average</span>
												
											</div>
										</div>
										<div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
											<div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $getAve['totalAve']?>%; height:20px;" role="progressbar">
												<span><?php echo $getAve['totalAve']?>% Complete</span>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							<?php
							while($task = $getTask->fetch_assoc()){
							?>
							<div class="col-xl-4 col-xxl-4 col-sm-6">
								<div class="bg-warning invoice-card shadow-lg rounded mb-2">
									<div class="p-3">
										<div class="d-flex">
											<div class="icon me-3">
												<img src="../../<?php echo $task['imagePath']?>" alt="image" class="img-fluid rounded-circle border-3 border border-white">
											</div> 
											<div class="d-flex flex-column">
												<span class="text-white fs-18 fw-bold"><?php echo $task['firstName'].' '.$task['lastName']?></span>
												
												<span class="text-white fs-10"><?php echo $task['userRole']?></span>
											</div>
										</div>
										<div class="progress default-progress my-2" style="outline: #ffffff solid 3px; box-shadow: none">
											<div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $task['process']?>%; height:20px;" role="progressbar">
												<span><?php echo $task['process']?>%</span>
											</div>
										</div>
										<div class="d-flex justify-content-evenly">
											<span class="text-white fs-18">Model: <b><?php echo $task['wigModel']?></b></span>
											<span class="text-white fs-18">Size: <b><?php echo $task['wigSize']?></b></span>
										</div>
										
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<!-- CALENDAR -->
					<div class="col-sm-4">
						<div class="row  mt-xl-0 mt-4 container mb-2">
							<div class="col-md-6">
								<h4 class="card-title">Task Overview</h4>
								<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit psu olor</span>
								<ul class="card-list mt-4">
									<li><span class="circle" style="background-color: #0096FF;"></span>Production<span>20</span></li>
									<li><span class="circle" style="background-color: #5800FF;"></span>Done<span>15</span></li>
									<li><span class="circle" style="background-color: #38bfb3;"></span>New<span>10</span></li>
									<li><span class="circle" style="background-color: #c8c8c8;"></span>Archived<span>5</span></li>
								</ul>
							</div>
							<div class="col-md-6">
								<canvas id="polarChart"></canvas>
							</div>
						</div>
						<?php include 'calendar.php'; ?>
					</div>
				</div>

				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		<!-- Required vendors -->
		<script src="vendor/global/global.min.js"></script>
		<script src="vendor/chart.js/Chart.bundle.min.js"></script>
		<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
		
		<!-- Apex Chart -->
		<script src="vendor/apexchart/apexchart.js"></script>
		<script src="vendor/nouislider/nouislider.min.js"></script>
		<script src="vendor/wnumb/wNumb.js"></script>
		
		<!-- Dashboard 1 -->
		<script src="js/dashboard/dashboard-1.js"></script>

		<script>
			$('#batchName').on('change',function(){
				let batchName = $(this).val();
				$.ajax({
					url   : 'action/ajax/dashboard.php',
					type  : 'POST',
					dataType: "text",
					data  : {batchName : batchName},
					success : function(data){
						$('#task').html(data);
					}
				});
			});
		</script>
	