<?php include 'action/pages/performance.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div id="mySidebar" class="sidebar bg-success color-white">
            <span href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="cursor: pointer; color: white">×</span>
            <a href="?performance&status=tstts5">Lapsed Report</a>
            <a href="?performance&status=tstts6">Damage Report</a>
            <a href="?performance&status=tstts7">On Time</a>
            <a href="?performance&status=tstts8">Early</a>
        </div>
        <div id="main">
            <div class="d-flex justify-content-between m-3 flex-end">
            <button id="btnRightArror" class="btn-primary btn mr-3" onclick="openNav()"><span>&rarr; Open</span> Sidebar</button>
            <?php echo $generateReport;?>
            </div>
            <div class="card p-3 m-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive p-3">
                            <table class="table table-responsive-lg" id="myTable5">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Wig Model</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    while($result = $results->fetch_assoc()){
                                        if($result['imagePath'] == ''){
                                            $imagePath = "img/profile/avatar.png";
                                        }else{
                                            $imagePath = $result['imagePath'];
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <a class="text-success" href="index.php?taskHistory&or=<?php echo $result['order_no'] ?>"><?php echo $result['order_no'] ?></a>
                                            </td>
                                            <td>
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?php echo $result['wigModel'] ?></h6>
                                                <span class="fs-14">Size: <?php echo $result['wigSize'] ?></span>
                                            </td>
                                            <td><?php echo $result['taskStatus'] ?></td>
                                            <td>
                                                <?php
                                                    if($result['process'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['process'].'%';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['start_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['start_date'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($result['end_date'] == ''){
                                                        echo "N/A";
                                                    }else{
                                                        echo $result['end_date'];
                                                    }
                                                ?>
                                            </td>
                                        
                                        </tr>
                                        <?php
                                            // include 'pages/component/myTaskModal.php';
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3 row">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="year">Select Year</label>
                                <select id="year" class="form-select">
                                    <?php 
                                        $year = $conn->query("SELECT DISTINCT(YEAR(end_date)) as years from tasks where end_date != NULL");
                                        while($years = $year->fetch_assoc()){
                                            $yearss = $years['years'];
                                            echo "<option value='$yearss'>$yearss</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="month">Select Month</label>
                                <select id="month" class="form-select">
                                    <?php 
                                        $month = $conn->query("SELECT DISTINCT(MONTH(end_date)) as months, YEAR(end_date) as years from tasks where end_date != NULL");
                                        while($months = $month->fetch_assoc()){
                                            $monthss = $months['months'];
                                            $years = $months['years'];
                                            echo "<option value='$monthss'>".date('F', strtotime($years.'-'.$monthss))."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <canvas id="polarChart"></canvas>
                        </div>
                        <div class="col-md-12">
                            <h4 class="card-title">Task Overview</h4>
                            <span>The summary of the early task, on time task, damage task, and lapsed task.</span>
                            <ul class="card-list mt-4">
                                <li><span class="circle" style="background-color: #00FF00;"></span>Early<span><?php echo $getProduction['production']?></span></li>
                                <li><span class="circle" style="background-color: #00A300;"></span>On Time<span><?php echo $getDone['done']?></span></li>
                                <li><span class="circle" style="background-color: #FF2E2E;"></span>Damage<span><?php echo $getNew['new']?></span></li>
                                <li><span class="circle" style="background-color: #c8c8c8;"></span>Lapsed<span><?php echo $getArchive['arc']?></span></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="generateRep" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <!-- <h5 class="modal-title">Employee Information</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="pages/pdf/performance.php" method="get" class="pt-2 needs-validation">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="startDate" class="fw-bold">Start Date</label>
                        <input type="date"  onchange="setEndDateMin(this)"
                        class="form-control" name="startDate" id="startDate" aria-describedby="helpId" placeholder="type here..." required>
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input start date.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="endDate" class="fw-bold">End Date</label>
                        <input type="date" min="<?php echo date('Y-m-d');?>T00:00" disabled
                        class="form-control" name="endDate" id="endDate" aria-describedby="helpId" placeholder="type here..." required>
                        <div class="valid-feedback">
                             
                        </div>
                        <div class="invalid-feedback">
                            Please input end date.
                        </div>
                    </div>

                </div>
                <input type="hidden" name="status" value="<?php echo $orderNo?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateLocation">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
		<script src="vendor/chart.js/Chart.bundle.min.js"></script>
		<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
		
		<!-- Apex Chart -->
		<script src="vendor/apexchart/apexchart.js"></script>
		<script src="vendor/nouislider/nouislider.min.js"></script>
		<script src="vendor/wnumb/wNumb.js"></script>

        <script>
			function setEndDateMin(me){
            let min = me.value;
            let newBatch = document.getElementById('endDate');
            newBatch.removeAttribute('disabled');
            newBatch.setAttribute('min', min);
        }

            

    $(document).ready(function(){
        var year = $('#year').val();
        var month = $('#month').val();
        $.ajax({
            url   : 'action/ajax/dashboard.php',
            type  : 'POST',
            dataType: "text",
            data  : {year : year, month : month},
            success : function(data){
                let lapsed = data.split(",");
                
                (function($) {
                    var polarChart = function(){
                        var ctx = document.getElementById("polarChart").getContext('2d');
                            Chart.defaults.global.legend.display = false;
                            var myChart = new Chart(ctx, {
                                type: 'polarArea',
                                data: {
                                    labels: ["LAPSED", "DAMAGE", "ON TIME", "EARLY"],
                                    datasets: [{
                                        backgroundColor: [
                                            "#c8c8c8",
                                            "#FF2E2E",
                                            "#00A300",
                                            "#00FF00"
                                        ],
                                        data: lapsed,
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
									polarChart();
								},
								
								resize:function(){
								}
							}
	

							
						}();

								dlabChartlist.load();
						})(jQuery);
            }
        });

        $('#month').on('change',function(){
            
            var year = $('#year').val();
            var month = $('#month').val();
				$.ajax({
					url   : 'action/ajax/dashboard.php',
					type  : 'POST',
					dataType: "text",
					data  : {year : year, month : month},
					success : function(data){
                        let lapsed = data.split(",");
                        
                (function($) {
                    var polarChart = function(){
                        var ctx = document.getElementById("polarChart").getContext('2d');
                            Chart.defaults.global.legend.display = false;
                            var myChart = new Chart(ctx, {
                                type: 'polarArea',
                                data: {
                                    labels: ["LAPSED", "DAMAGE", "ON TIME", "EARLY"],
                                    datasets: [{
                                        backgroundColor: [
                                            "#c8c8c8",
                                            "#FF2E2E",
                                            "#00A300",
                                            "#00FF00"
                                        ],
                                        data: lapsed,
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
									polarChart();
								},
								
								resize:function(){
								}
							}
	

							
						}();

						
								dlabChartlist.load();
							
						})(jQuery);
                    }
                });
        });



    });

    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";

        document.getElementById("btnRightArror").style.display = "none";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";

        document.getElementById("btnRightArror").style.display = "block";
    }
</script>