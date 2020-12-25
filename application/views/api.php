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
    <form action="<?php echo base_url(); ?>index.php/user/get_weather" method="Get" name="api_form">

        <div class="email-login" style="background-color:#ffffff;">
            <div class="form-group">
                
                <input type="text" name="city" class=" form-control" required="" placeholder="Enter City Name">
            </div>
            
        </div>
        <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <input type="Submit" name="Submit" value="Get Weather" class="btn btn-primary btn-block box-shadow" />

        </div>
    </form>

    <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
   
    <?php
    if(isset($response)){
       echo $response['city']."<br/>";
       echo $response['temperature'];
    }
    ?>
    </div>
    <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
        <a href="https://github.com/vibhanshumonty" target="_blank">K. Vibhanshu</a>
    </div>
</div>



<?php
$this->load->view('footer');
?>