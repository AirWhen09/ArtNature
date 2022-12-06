<?php
    if(isset($_SESSION['firstName']) && isset($_SESSION['email']) && isset($_SESSION['image'])){
        $firstName = $_SESSION['firstName'];
        $email = $_SESSION['email'];
        $image = '../../'.$_SESSION['image'];
    }else{
        $firstName = "HACKER";
        $email = "HACKER@HACKER.com";
        $image = "images/ion/man (1).png";
    }
	$rejectedBadge = '';
	$selReject = $conn->query("SELECT count(*) as rejected from wig_picture as a join tasks as b on b.order_no = a.task_id where b.user_id = '$isLoginUserId' and a.pic_status = 'Rejected'")->fetch_assoc();
	// if($selReject->num_rows > 0){
		if($selReject['rejected'] > 0){
			$rT = $selReject['rejected'];
			$rejectedBadge = "<label class='badge badge-primary'>$rT</label>";
		}else{
			$rejectedBadge = '';
		}
	// }
    
?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="index.php?account" >
							<img src="<?php echo $image ?>" width="20" alt=""/>
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi,<b><?php echo $firstName ?></b></span>
								<small class="text-end font-w400"><?php echo $email ?></small>
							</div>
						</a>
						
					</li>
					<?php if($_SESSION['user_role'] === "ur1"){ ?>
                    <li><a href="index.php?dashboard" aria-expanded="false" >
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text <?php if(isset($_GET['dashboard'])) echo "text-primary"; ?>">Dashboard</span>
						</a>
                    </li>
					<?php } ?>
					<!-- FOR EMPLOYEE  -->
					<?php if($_SESSION['user_role'] === "ur2" || $_SESSION['user_role'] === "ur3"){ ?>
						<li>
							<a href="index.php?myTask" aria-expanded="false">
								<i class="flaticon-041-graph"></i>
								<span class="nav-text <?php if(isset($_GET['myTask'])) echo "text-primary"; ?>">My Task</span>
								<?php echo $rejectedBadge?>
							</a>
                   		 </li>
					<?php } ?>
					<!-- For Driver -->
					<?php if($_SESSION['user_role'] === "ur4"){ ?>
						<li>
							<a href="index.php?location" aria-expanded="false">
								<i class="flaticon-041-graph"></i>
								<span class="nav-text <?php if(isset($_GET['location'])) echo "text-primary"; ?>">Product Location</span>
							</a>
                   		 </li>
					<?php } ?>
					<!-- for Admin -->
					<?php if($_SESSION['user_role'] === "ur1"){ ?>
                    <li><a href="index.php?employeeList" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text <?php if(isset($_GET['employeeList'])) echo "text-primary"; ?>">Manage Employee</span>
						</a>
                    </li>
                    <li><a href="index.php?manageTask" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text <?php if(isset($_GET['manageTask'])) echo "text-primary"; ?>">Manage Task</span>
						</a>
                    </li>
					
					<li class="dropdown">
							<a href="javascript:void()" class="nav-text"> <i class="flaticon-041-graph"></i>  Reports</a>
							<div class="dropdown-content">
								<a class="dropdown-item" href="index.php?performance" >Performance Report</a>
								<a class="dropdown-item" href="index.php?progressReport">Progress Report</a>
							</div>
                    </li>
					<li><a href="index.php?performance" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text <?php if(isset($_GET['performance'])) echo "text-primary"; ?>">Performance</span>
						</a>
                    </li>
					<?php } ?>
                    <!-- <li><a href="index.php?chat" aria-expanded="false">
							<i class="flaticon-093-waving"></i>
							<span class="nav-text <?php //if(isset($_GET['chat'])) echo "text-primary"; ?>">Chats</span>
						</a>
                    </li> -->
					<?php if($_SESSION['user_role'] === "ur1"){ ?>
                    <!-- <li><a href="index.php?progressReport" aria-expanded="false">
							<i class="flaticon-018-clock"></i>
							<span class="nav-text <?php //if(isset($_GET['progressReport']) || isset($_GET['batch'])) echo "text-primary"; ?>">Progress Report</span>
						</a>
                    </li> -->
                    <!-- <li><a href="index.php?delivery" class="ai-icon" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text <?php //if(isset($_GET['delivery'])) echo "text-primary"; ?>">Product Location</span>
						</a>
					</li> -->
                    <li><a href="index.php?setting" aria-expanded="false">
							<i class="flaticon-042-menu"></i>
							<span class="nav-text <?php if(isset($_GET['setting'])) echo "text-primary"; ?>">Setting</span>
						</a>
                    </li>
					<?php } ?>
                    <li><a href="javascript:void()" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#modelId">
							<i class="flaticon-061-outside"></i>
							<span class="nav-text">Logout</span>
						</a>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->