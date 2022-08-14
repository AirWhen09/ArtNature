<?php include 'action/pages/dashboard.php'; ?>
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row invoice-card-row">
					<div class="row col-sm-8">
						<?php
						while($task = $getTask->fetch_assoc()){
						?>
						<div class="col-xl-4 col-xxl-4 col-sm-6">
							<div class="card bg-warning invoice-card">
								<div class="card-body">
									<div class="d-flex">
										<div class="icon me-3">
											<img src="../../<?php echo $task['imagePath']?>" alt="image" class="img-fluid rounded-circle border-3 border border-white">
										</div> 
										<div>
											<h2 class="text-white invoice-num"><?php echo $task['process']?>% </h2>
											<span class="text-white fs-18"><?php echo $task['firstName'].' '.$task['lastName']?></span>
										</div>
									</div><br>
									<div class="progress default-progress" style="outline: #ffffff solid 3px; box-shadow: none">
										<div class="progress-bar bg-gradient-1 progress-animated" style="width: <?php echo $task['process']?>%; height:20px;" role="progressbar">
											<span><?php echo $task['process']?>%</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
					</div>
					<!-- CALENDAR -->
					<div class="col-sm-4">
						<?php include 'calendar.php'; ?>
					</div>
				</div>

				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
			<!-- Dashboard 1 -->
		<!-- <script src="js/dashboard/dashboard-1.js"></script> -->
			<!-- Apex Chart -->
		<!-- <script src="vendor/apexchart/apexchart.js"></script>
		<script src="vendor/nouislider/nouislider.min.js"></script>
		<script src="vendor/wnumb/wNumb.js"></script> -->