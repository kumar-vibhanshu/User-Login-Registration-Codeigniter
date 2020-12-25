<?php
$this->load->view('header');
?>
<?php
$user = $this->session->userdata('user');
extract($user);
?>

<div class="d-flex flex-column justify-content-center" id="login-box">
    <div class="login-box-header">
        <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">
        <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i></a>
        
            Welcome <?php echo $first_name; ?> <?php echo $last_name; ?>
            <span><a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>
                </a></span>
        </h4>
    </div>
    <form action="<?php echo base_url(); ?>index.php/user/cod_data" method="POST" name="cod_form">
    <input type="text" name="userid" class=" form-control" hidden readonly placeholder="<?php echo $id; ?>">
   
        <div class="email-login" style="background-color:#ffffff;">
            <div class="form-group">
                <label>Tracking Number</label>
                <input type="number" maxlength="8" minlength="8" name="tracking_no" class=" form-control" required="" placeholder="Tracking Number">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class=" form-control"  required="" readonly placeholder="<?php echo $status; ?> ">
            </div>
        </div>
        <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <input type="submit" name="save" value="COD" class="btn btn-primary btn-block box-shadow" />

        </div>
    </form>


    <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
        <a href="https://github.com/vibhanshumonty" target="_blank">K. Vibhanshu</a>
    </div>
</div>



<?php
$this->load->view('footer');
?>