<?php
$userId     = $userInfo->userId;
$name       = $userInfo->name;
$email      = $userInfo->email;
$mobile     = $userInfo->mobile;
$roleId     = $userInfo->roleId;
$role       = $userInfo->role;
?>
 <div class="dashboard-wrapper" id="page-content-wrapper">
    <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <div class="ecommerce-widget">            
                <!-- Filter Criteria Form start -->
                <div class="editViewLeadClass">
                     <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
                    <section class="content">
    
        <div class="row">
            <!-- left column -->
        

            <div class="col-md-6 offset-md-3">
                <div class="card" style="margin-top: 30px;">
                    <div class="nav-tabs-custom pills-regular">
                        <ul class="nav nav-pills card-header-pills profiletabs">
                            <li class="nav-item <?= ($active == "details")? "active" : "" ?>"><a class="nav-link active" href="#details" data-toggle="tab">Details</a></li>
                            <li class="nav-item <?= ($active == "changepass")? "active" : "" ?>"><a class="nav-link" href="#changepass" data-toggle="tab">Change Password</a></li>                         
                        </ul>
                        <div class="tab-content">
                            <div class="<?= ($active == "details")? "active" : "" ?> tab-pane" id="details">
                                <form action="<?php echo base_url() ?>profileUpdate" method="post" id="editProfile" role="form">
                                    <?php $this->load->helper('form'); ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">                                
                                                <div class="form-group">
                                                    <label for="fname">Full Name</label>
                                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" maxlength="128" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" value="<?php echo set_value('mobile', $mobile); ?>" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
											<div class="col-sm-12 text-center mt-3">
												<input type="submit" class="btn btn-primary" value="Submit" /> &nbsp;
												<input type="reset" class="btn btn-default" value="Reset" />
											</div>
										</div>
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                            <div class="<?= ($active == "changepass")? "active" : "" ?> tab-pane" id="changepass"> 
                                <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputPassword1">Old Password</label>
                                                    <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputPassword1">New Password</label>
                                                    <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputPassword2">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="20" required>
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
											<div class="col-sm-12 text-center mt-3">
												<input type="submit" class="btn btn-primary" value="Submit" /> &nbsp;
												<input type="reset" class="btn btn-default" value="Reset" />
											</div>
										</div>
                                    </div><!-- /.box-body -->
                                </form>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>
<script type="text/javascript">
$(document).ready(function(){
    var editProfileForm = $("#editProfile");    
    var validator = editProfileForm.validate({        
        rules:{
            fname :{ required : true },
            mobile : { required : true, digits : true }         
        },
        messages:{
            fname :{ required : "This field is required" },
            mobile : { required : "This field is required", digits : "Please enter numbers only" }          
        }
    });  

});
</script>