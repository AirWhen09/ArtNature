		
        <!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">
		
            <div class="copyright">
                <p>© Designed &amp; by <a href="#" target="_blank">Animation Coding</a> 2022</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->

		


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
    <script type="text/javascript" src="vendor/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable1').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
            $('#myTable5').DataTable();
            $('#myTable6').DataTable();
            $('#myTable7').DataTable();
        } );

        function myProcess1(x){
            let process = "processStatus1"+x.id;
            document.getElementById(process).innerText = x.value;
        }

        function myProcess2(x){
            let process = "processStatus2"+x.id;
            document.getElementById(process).innerText = x.value;
        }

        function myProcess3(x){
            let process = "processStatus3"+x.id;
            document.getElementById(process).innerText = x.value;
        }

        
</script>

    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="../../js/formValidation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
       
<script>
    $('.adminRemarks').on('click',function(){
				let remarks = $(this).val();
				let userId = $(this).data('user');
                let orderNo = '<?php echo $orNo?>';
                var r = confirm(`Set "${remarks}" for the remarks?`);  
                if (r == true) {  
                    $.ajax({
                        url   : 'action/ajax/dashboard.php',
                        type  : 'POST',
                        dataType: "text",
                        data  : {orNo : orderNo, remarks : remarks, userid : userId},
                        success : function(data){
                        }
                    });

                        document.addEventListener('DOMContentLoaded', (event) => {    
                            document.getElementById("showNotif").click( function(){
                                var audio = new Audio("../../img/audio.wav");
                                audio.play();
                            });

                            
                            });

                } 
				
			});
</script>
	
</body>

</html>