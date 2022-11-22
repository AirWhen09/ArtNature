<!-- Modal -->
<div class="modal fade" id="myTaskAreaI" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: <?php echo $_GET['orderNo']?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea1')" onmouseout="hideUpdatePic('showMeArea1')">
                                    <div class="text-center bg-white d-none" id="showMeArea1" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area1Pic1 == NULL || $area1Pic1 == '') ? '../../img/noData.jpg' : '../../'.$area1Pic1;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    id="img1s"
                                    style="cursor: pointer;"
                                    data-area="area_i"
                                    data-areapic="area_i_pic_one"
                                    data-title="Area 1 picture number 1"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area1Pic1Status != ""){?>
                                    <div class="badge badge-<?php echo $area1Pic1Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area1Pic1Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea2')" onmouseout="hideUpdatePic('showMeArea2')">
                                    <div class="text-center bg-white d-none" id="showMeArea2" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area1Pic2 == NULL || $area1Pic2 == '') ? '../../img/noData.jpg' : '../../'.$area1Pic2;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_i"
                                    data-areaPic="area_i_pic_two"
                                    data-title="Area 1 picture number 2"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area1Pic2Status != ""){?>
                                    <div class="badge badge-<?php echo $area1Pic2Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area1Pic2Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea3')" onmouseout="hideUpdatePic('showMeArea3')">
                                    <div class="text-center bg-white d-none" id="showMeArea3" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area1Pic3 == NULL || $area1Pic3 == '') ? '../../img/noData.jpg' : '../../'.$area1Pic3;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_i"
                                    data-areaPic="area_i_pic_three"
                                    data-title="Area 1 picture number 3"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area1Pic3Status != ""){?>
                                    <div class="badge badge-<?php echo $area1Pic3Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area1Pic3Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea4')" onmouseout="hideUpdatePic('showMeArea4')">
                                    <div class="text-center bg-white d-none" id="showMeArea4" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area1Pic4 == NULL || $area1Pic4 == '') ? '../../img/noData.jpg' : '../../'.$area1Pic4;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_i"
                                    data-areaPic="area_i_pic_four"
                                    data-title="Area 1 picture number 4"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area1Pic4Status != ""){?>
                                    <div class="badge badge-<?php echo $area1Pic4Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area1Pic4Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myTaskAreaII" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: 2</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="container-fluid" onmouseover="showUpdatePic('showMeArea1')" onmouseout="hideUpdatePic('showMeArea1')">
                                            <div class="text-center bg-white d-none" id="showMeArea1" style="position:absolute; cursor: pointer; background-color: white">
                                                <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                            </div>
                                            <img 
                                            src="<?php echo ($area2Pic1 == NULL || $area2Pic1 == '') ? '../../img/noData.jpg' : '../../'.$area2Pic1;?>" 
                                            alt="avatar"
                                            class="img-fluid"
                                            id="img1s"
                                            style="cursor: pointer;"
                                            data-area="area_ii"
                                            data-areapic="area_ii_pic_one"
                                            data-title="Area 2 picture number 1"
                                            onclick="showModal(this)"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateModal"
                                            >
                                            <?php 
                                            if($area2Pic1Status != ""){?>
                                            <div class="badge badge-<?php echo $area2Pic1Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                                    <label for=""><?php echo $area2Pic1Status?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="container-fluid" onmouseover="showUpdatePic('showMeArea2')" onmouseout="hideUpdatePic('showMeArea2')">
                                            <div class="text-center bg-white d-none" id="showMeArea2" style="position:absolute; cursor: pointer; background-color: white">
                                                <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                            </div>
                                            <img 
                                            src="<?php echo ($area2Pic2 == NULL || $area2Pic2 == '') ? '../../img/noData.jpg' : '../../'.$area2Pic2;?>" 
                                            alt="avatar"
                                            class="img-fluid"
                                            style="cursor: pointer;"
                                            id="img1s"
                                            data-area="area_ii"
                                            data-areaPic="area_ii_pic_two"
                                            data-title="Area 2 picture number 2"
                                            onclick="showModal(this)"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateModal"
                                            >
                                            <?php 
                                            if($area2Pic2Status != ""){?>
                                            <div class="badge badge-<?php echo $area2Pic2Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                                    <label for=""><?php echo $area2Pic2Status?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="container-fluid" onmouseover="showUpdatePic('showMeArea3')" onmouseout="hideUpdatePic('showMeArea3')">
                                            <div class="text-center bg-white d-none" id="showMeArea3" style="position:absolute; cursor: pointer; background-color: white">
                                                <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                            </div>
                                            <img 
                                            src="<?php echo ($area2Pic3 == NULL || $area2Pic3 == '') ? '../../img/noData.jpg' : '../../'.$area2Pic3;?>" 
                                            alt="avatar"
                                            class="img-fluid"
                                            style="cursor: pointer;"
                                            id="img1s"
                                            data-area="area_ii"
                                            data-areaPic="area_ii_pic_three"
                                            data-title="Area 2 picture number 3"
                                            onclick="showModal(this)"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateModal"
                                            >
                                            <?php 
                                            if($area2Pic3Status != ""){?>
                                            <div class="badge badge-<?php echo $area2Pic3Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                                    <label for=""><?php echo $area2Pic3Status?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="container-fluid" onmouseover="showUpdatePic('showMeArea4')" onmouseout="hideUpdatePic('showMeArea4')">
                                            <div class="text-center bg-white d-none" id="showMeArea4" style="position:absolute; cursor: pointer; background-color: white">
                                                <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                            </div>
                                            <img 
                                            src="<?php echo ($area2Pic4 == NULL || $area2Pic4 == '') ? '../../img/noData.jpg' : '../../'.$area2Pic4;?>" 
                                            alt="avatar"
                                            class="img-fluid"
                                            style="cursor: pointer;"
                                            id="img1s"
                                            data-area="area_ii"
                                            data-areaPic="area_ii_pic_four"
                                            data-title="Area 2 picture number 4"
                                            onclick="showModal(this)"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateModal"
                                            >
                                            <?php 
                                            if($area2Pic4Status != ""){?>
                                            <div class="badge badge-<?php echo $area2Pic4Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                                    <label for=""><?php echo $area2Pic4Status?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myTaskAreaIII" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: 3</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea1')" onmouseout="hideUpdatePic('showMeArea1')">
                                    <div class="text-center bg-white d-none" id="showMeArea1" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area3Pic1 == NULL || $area3Pic1 == '') ? '../../img/noData.jpg' : '../../'.$area3Pic1;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    id="img1s"
                                    style="cursor: pointer;"
                                    data-area="area_iii"
                                    data-areapic="area_iii_pic_one"
                                    data-title="Area 3 picture number 1"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area3Pic1Status != ""){?>
                                    <div class="badge badge-<?php echo $area3Pic1Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area3Pic1Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea2')" onmouseout="hideUpdatePic('showMeArea2')">
                                    <div class="text-center bg-white d-none" id="showMeArea2" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area3Pic2 == NULL || $area3Pic2 == '') ? '../../img/noData.jpg' : '../../'.$area3Pic2;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iii"
                                    data-areaPic="area_iii_pic_two"
                                    data-title="Area 3 picture number 2"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area3Pic2Status != ""){?>
                                    <div class="badge badge-<?php echo $area3Pic2Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area3Pic2Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea3')" onmouseout="hideUpdatePic('showMeArea3')">
                                    <div class="text-center bg-white d-none" id="showMeArea3" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area3Pic3 == NULL || $area3Pic3 == '') ? '../../img/noData.jpg' : '../../'.$area3Pic3;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iii"
                                    data-areaPic="area_iii_pic_three"
                                    data-title="Area 3 picture number 3"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area3Pic3Status != ""){?>
                                    <div class="badge badge-<?php echo $area3Pic3Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area3Pic3Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea4')" onmouseout="hideUpdatePic('showMeArea4')">
                                    <div class="text-center bg-white d-none" id="showMeArea4" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area3Pic4 == NULL || $area3Pic4 == '') ? '../../img/noData.jpg' : '../../'.$area3Pic4;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iii"
                                    data-areaPic="area_iii_pic_four"
                                    data-title="Area 3 picture number 4"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area3Pic4Status != ""){?>
                                    <div class="badge badge-<?php echo $area3Pic4Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area3Pic4Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myTaskAreaIV" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header">
                        <h3 class="modal-title">Order Number: 4</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea1')" onmouseout="hideUpdatePic('showMeArea1')">
                                    <div class="text-center bg-white d-none" id="showMeArea1" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area4Pic1 == NULL || $area4Pic1 == '') ? '../../img/noData.jpg' : '../../'.$area4Pic1;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    id="img1s"
                                    style="cursor: pointer;"
                                    data-area="area_iv"
                                    data-areapic="area_iv_pic_one"
                                    data-title="Area 4 picture number 1"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area4Pic1Status != ""){?>
                                    <div class="badge badge-<?php echo $area4Pic1Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area4Pic1Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea2')" onmouseout="hideUpdatePic('showMeArea2')">
                                    <div class="text-center bg-white d-none" id="showMeArea2" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area4Pic2 == NULL || $area4Pic2 == '') ? '../../img/noData.jpg' : '../../'.$area4Pic2;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iv"
                                    data-areaPic="area_iv_pic_two"
                                    data-title="Area 4 picture number 2"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area4Pic2Status != ""){?>
                                    <div class="badge badge-<?php echo $area4Pic2Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area4Pic2Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea3')" onmouseout="hideUpdatePic('showMeArea3')">
                                    <div class="text-center bg-white d-none" id="showMeArea3" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area4Pic3 == NULL || $area4Pic3 == '') ? '../../img/noData.jpg' : '../../'.$area4Pic3;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iv"
                                    data-areaPic="area_iv_pic_three"
                                    data-title="Area 4 picture number 3"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area4Pic3Status != ""){?>
                                    <div class="badge badge-<?php echo $area4Pic3Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area4Pic3Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="container-fluid" onmouseover="showUpdatePic('showMeArea4')" onmouseout="hideUpdatePic('showMeArea4')">
                                    <div class="text-center bg-white d-none" id="showMeArea4" style="position:absolute; cursor: pointer; background-color: white">
                                        <h4 class="text-center mt-2 p-2" > Update Picture </h4>
                                    </div>
                                    <img 
                                    src="<?php echo ($area4Pic4 == NULL || $area4Pic4 == '') ? '../../img/noData.jpg' : '../../'.$area4Pic4;?>" 
                                    alt="avatar"
                                    class="img-fluid"
                                    style="cursor: pointer;"
                                    id="img1s"
                                    data-area="area_iv"
                                    data-areaPic="area_iv_pic_four"
                                    data-title="Area 4 picture number 4"
                                    onclick="showModal(this)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    >
                                    <?php 
                                    if($area4Pic4Status != ""){?>
                                    <div class="badge badge-<?php echo $area4Pic4Status == 'Approved' ? 'success' : 'primary'?>" style="position: absolute; ">
                                            <label for=""><?php echo $area4Pic4Status?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="pt-2 needs-validation" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="container-fluid">
                        <img 
                        src="" 
                        id="myImages"
                        alt="avatar"
                        class="img-fluid mb-3"
                        style="cursor: pointer;"
                        >
                        <input type="file" id="myImage" name="img" class="form-controll" onchange="loadfile(event)" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="wigId" value="<?php echo $wigId?>">
                    <input type="hidden" name="areaPic" id="areaPic">
                    <input type="hidden" name="areaNo" id="areaNo">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateImg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function showModal(x){
        let areaNo = x.dataset.area;
        let areaPic = x.dataset.areapic;
        let title = x.dataset.title;
        let src = x.src;

        document.getElementById('modalTitleId').innerText = title;
        document.getElementById('myImages').src = src;
        let inputF = document.getElementById('areaPic');
        let inputN = document.getElementById('areaNo');
        console.log(areaPic);
        inputF.setAttribute('value', areaPic);
        inputN.setAttribute('value', areaNo);
    }
    function showUpdatePic(x) {
        document.getElementById(x).classList.remove("d-none");
    }

    function hideUpdatePic(x) {
        document.getElementById(x).classList.add("d-none");
    }
    function loadfile(event){
        let imgId = event.target.id + 's';
        var output=document.getElementById(imgId);
        output.src=URL.createObjectURL(event.target.files[0]);
    };
</script>