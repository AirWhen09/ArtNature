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
?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="<?php echo $image ?>" width="20" alt=""/>
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi,<b><?php echo $firstName ?></b></span>
								<small class="text-end font-w400"><?php echo $email ?></small>
							</div>
						</a>
						
					</li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">Employee List</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">Manage Task</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-093-waving"></i>
							<span class="nav-text">Chats</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-018-clock"></i>
							<span class="nav-text">Progress Report</span>
						</a>
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text">Delivery</span>
						</a>
					</li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-042-menu"></i>
							<span class="nav-text">Setting</span>
						</a>
                    </li>
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