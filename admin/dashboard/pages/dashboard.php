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
							$batchId = $batch['batch_id'];
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
										<?php
										$aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status  != 'tstts4'";
										$getAve = $conn->query($aveProcess)->fetch_assoc();


										?>
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
								$orderNo = $task['order_no'];
								
							?>
							<div class="col-xl-4 col-xxl-4 col-sm-6">
								<a href="index.php?taskHistory&or=<?php echo $task['order_no']?>">
									<div class="bg-warning invoice-card shadow-lg rounded mb-2">
										<div class="p-3">
											<div class="d-flex">
												<div class="icon me-3">
													<img src="../../<?php echo $task['imagePath']?>" alt="image" class="img-fluid rounded-circle border-3 border border-white">
												</div> 
												<div class="d-flex flex-column">
													<span class="text-white fs-18 fw-bold"><?php echo $task['firstName'].' '.$task['lastName']?></span>
													
													<span class="text-white fs-10"><?php echo $task['userRole']?></span>
													<span class="text-white fs-10">or #: <b><?php echo $task['order_no']?></b></span>
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
								</a>
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
								<span>The summary of the production task, done task, new task, and unassign task.</span>
								<ul class="card-list mt-4">
									<li><span class="circle" style="background-color: #0096FF;"></span>Production<span><?php echo $getProduction['production']?></span></li>
									<li><span class="circle" style="background-color: #5800FF;"></span>Done<span><?php echo $getDone['done']?></span></li>
									<li><span class="circle" style="background-color: #38bfb3;"></span>New<span><?php echo $getNew['new']?></span></li>
									<li><span class="circle" style="background-color: #c8c8c8;"></span>Lapsed<span><?php echo $getArchive['arc']?></span></li>
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

		<?php include 'pages/validation/helpers.php'?>
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
		<!-- <script src="js/dashboard/dashboard-1.js"></script> -->

		<script>
			

(function($) {
    /* "use strict" */
	
 var dlabChartlist = function(){
	
	

	var polarChart = function(){
		 var ctx = document.getElementById("polarChart").getContext('2d');
			Chart.defaults.global.legend.display = false;
			var myChart = new Chart(ctx, {
				type: 'polarArea',
				data: {
					labels: ["Archived", "New", "Done", "Production"],
					datasets: [{
						backgroundColor: [
							"#c8c8c8",
							"#38bfb3",
							"#5800FF",
							"#0096FF"
						],
						data: <?php echo $taskOverview ?>
					}]
				},
				options: {
					maintainAspectRatio: false,
					scale: {
						scaleShowLine:true,
						display:false,
						 pointLabels:{
							fontSize: 10       
						 },
					},
					tooltips:{
						enabled:true,
					}
				}
			});
	}	
	
	var handleCard = function(){
		
		// Vars
		var reloadButton  = document.querySelector( '.change-btn' );
		var reloadIcon     = document.querySelector( '.reload' );
		var reloadEnabled = true;
		var rotation      = 0;
		// Events
		reloadButton.addEventListener('click', function() { reloadClick() });
		// Functions
		function reloadClick() {
		  reloadEnabled = false;
		  rotation += 360;
		  // Eh, this works.
		  reloadIcon.style.webkitTransform = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		  reloadIcon.style.MozTransform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		  reloadIcon.style.transform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		}
		// Show button.
		setTimeout(function() {
		  reloadButton.classList.add('active');
		}, 1);
		
		//Number formatting
		var sliderFormat = document.getElementById('slider-format');
		noUiSlider.create(sliderFormat, {
			start: [20000],
			step: 1000,
			connect: [true, false],
			range: {
				'min': [20000],
				'max': [80000]
			},
			ariaFormat: wNumb({
				decimals: 3
			}),
			format: wNumb({
				decimals: 3,
				thousand: '.',
				//suffix: ' (US $)'
			})
		});

		var inputFormat = document.getElementById('input-format');
		sliderFormat.noUiSlider.on('update', function (values, handle) {
			inputFormat.value = values[handle];
		});

		inputFormat.addEventListener('change', function () {
			sliderFormat.noUiSlider.set(this.value);
		});
		//Number formatting ^
	}
 
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				
				polarChart();
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dlabChartlist.load();
		}, 1000); 
		
	});

     

})(jQuery);

			$('#batchName').on('change',function(){
				let batchName = $(this).val();
				$.ajax({
					url   : 'action/ajax/dashboard.php',
					type  : 'POST',
					dataType: "json",
					data  : {batchName : batchName},
					success : function(data){
					    console.log(data);
						let lapsed = data.lapsed.split(",");
						let goods = data.goods.split(",");
						let dateRange = data.daterange.split(",");
						
						$('#task').html(data.datas);
						(function($) {
							var chartBar2 = function(){
		
								var options = {
									series: [
										{
											name: 'DONE',
											data: goods,
											//radius: 12,	
										}, 
										{
										name: 'LAPSED',
										data: lapsed
										}, 
										
									],
										chart: {
										type: 'bar',
										height: 400,
										
										toolbar: {
											show: false,
										},
										
									},
									plotOptions: {
									bar: {
										horizontal: false,
										columnWidth: '70%',
										borderRadius:10
									},
									
									},
									states: {
									hover: {
										filter: 'none',
									}
									},
									colors:['#80ec67', '#fe7d65'],
									dataLabels: {
									enabled: false,
									},
									markers: {
								shape: "circle",
								},
								
								
									legend: {
										position: 'top',
										horizontalAlign: 'right', 
										show: true,
										fontSize: '12px',
										labels: {
											colors: '#000000',
											
											},
										markers: {
										width: 18,
										height: 18,
										strokeWidth: 0,
										strokeColor: '#fff',
										fillColors: undefined,
										radius: 12,	
										}
									},
									stroke: {
									show: true,
									width: 5,
									colors: ['transparent']
									},
									grid: {
										borderColor: '#eee',
									},
									xaxis: {
										
									categories: dateRange,
									labels: {
									style: {
										colors: '#3e4954',
										fontSize: '13px',
										fontFamily: 'poppins',
										fontWeight: 400,
										cssClass: 'apexcharts-xaxis-label',
										},
									},
									crosshairs: {
									show: false,
									}
									},
									yaxis: {
										labels: {
											offsetX:-16,
										style: {
											colors: '#3e4954',
											fontSize: '1px',
											fontFamily: 'poppins',
											fontWeight: 400,
											cssClass: 'apexcharts-xaxis-label',
										},
									},
									},
									fill: {
									opacity: 1,
									colors:['#80ec67', '#fe7d65'],
									},
									tooltip: {
									y: {
										formatter: function (val) {
										return  val 
										}
									}
									},
									responsive: [{
										breakpoint: 575,
										options: {
											chart: {
												height: 250,
											}
										},
									}]
									};

									var chartBar1 = new ApexCharts(document.querySelector("#chartBar2"), options);
									chartBar1.render();
							}

							var handleCard = function(){
			
								// Vars
								var reloadButton  = document.querySelector( '.change-btn' );
								var reloadIcon     = document.querySelector( '.reload' );
								var reloadEnabled = true;
								var rotation      = 0;
								// Events
								reloadButton.addEventListener('click', function() { reloadClick() });
								// Functions
								function reloadClick() {
								reloadEnabled = false;
								rotation += 360;
								// Eh, this works.
								reloadIcon.style.webkitTransform = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								reloadIcon.style.MozTransform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								reloadIcon.style.transform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								}
								// Show button.
								setTimeout(function() {
								reloadButton.classList.add('active');
								}, 1);
								
								//Number formatting
								var sliderFormat = document.getElementById('slider-format');
								noUiSlider.create(sliderFormat, {
									start: [20000],
									step: 1000,
									connect: [true, false],
									range: {
										'min': [20000],
										'max': [80000]
									},
									ariaFormat: wNumb({
										decimals: 3
									}),
									format: wNumb({
										decimals: 3,
										thousand: '.',
										//suffix: ' (US $)'
									})
								});

								var inputFormat = document.getElementById('input-format');
								sliderFormat.noUiSlider.on('update', function (values, handle) {
									inputFormat.value = values[handle];
								});

								inputFormat.addEventListener('change', function () {
									sliderFormat.noUiSlider.set(this.value);
								});
								//Number formatting ^
							}
											
							var dlabChartlist = function(){
								var screenWidth = $(window).width();	
								var handleCard = function(){
							
								// Vars
								var reloadButton  = document.querySelector( '.change-btn' );
								var reloadIcon     = document.querySelector( '.reload' );
								var reloadEnabled = true;
								var rotation      = 0;
								// Events
								reloadButton.addEventListener('click', function() { reloadClick() });
								// Functions
								function reloadClick() {
								reloadEnabled = false;
								rotation += 360;
								// Eh, this works.
								reloadIcon.style.webkitTransform = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								reloadIcon.style.MozTransform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								reloadIcon.style.transform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
								}
								// Show button.
								setTimeout(function() {
								reloadButton.classList.add('active');
								}, 1);
							
								//Number formatting
								var sliderFormat = document.getElementById('slider-format');
								noUiSlider.create(sliderFormat, {
									start: [20000],
									step: 1000,
									connect: [true, false],
									range: {
										'min': [20000],
										'max': [80000]
									},
									ariaFormat: wNumb({
										decimals: 3
									}),
									format: wNumb({
										decimals: 3,
										thousand: '.',
										//suffix: ' (US $)'
									})
							});

							var inputFormat = document.getElementById('input-format');
							sliderFormat.noUiSlider.on('update', function (values, handle) {
								inputFormat.value = values[handle];
							});

							inputFormat.addEventListener('change', function () {
								sliderFormat.noUiSlider.set(this.value);
							});
							//Number formatting ^
						}
							return {
								init:function(){
								},
								
								
								load:function(){
									chartBar2();
								},
								
								resize:function(){
								}
							}
	

							
						}();

						setTimeout(function(){
								dlabChartlist.load();
							}, 1000); 
						})(jQuery);
					}
				});
			});
		</script>
	