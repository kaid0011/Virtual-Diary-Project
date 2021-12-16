<section style="background-color: #e9ecef; min-height: 75vh; padding-top: 80px">
  
    <h1 class="h1 mb-4 pt-1 text-dark text-center ps-5">Update Profile</h1>
    <!--div class="p-5 text-center bg-image" style="background-image: url('imgs/white.png'); height: 300px; width: auto;"-->
<div class="container  justify-content-center align-items-center ">

    <div class="align-items-center justify-content-center">

      <div class="justify-content-center align-items-center text-center ps-5">
        <?php $source = $this->UpdateProfile_model->getImage();?>
        <a href="#"><img src="<?= base_url($source) ?>"></a>
      </div>
      
      <form method="post" enctype="multipart/form-data" action="<?= base_url('updateprofile/image') ?>">
        <div class="align-items-center text-center justify-content-center pt-3 ps-5">
          <input type="file" name="file" id="file" />
        </div>
        <!-- <a href="#"><img src="<?= base_url('assets/images/visitedprofile/profile.png') ?>" class="rounded-circle border border-3 border-secondary mb-2" alt="..."></a>  -->
        <div class="d-flex justify-content-center pt-3">
          <input type="submit" name="action" id="remove" value="Remove Image" class="input-group-text me-3" style="background-color:#ced4da; font-size: 15px; Height: 41px;" />
          <input type="submit" name="action" id="insert" value="Update Image" class="input-group-text" style="background-color:#ced4da; font-size: 15px; Height: 41px;" />
        </div>
      </form>

    </div>


    <div class="col-md p-5 d-flex justify-content-center align-items-center">
      <p class="lead align-center">

        <div class="mb-3 text-start text-secondary inputbox">
    

      <form method="post" class="responsiveInput" action="<?= base_url('updateprofile/updateusername') ?>" autocomplete="off">
        <!-- UserName -->
        <label for="exampleInputname1" class="form-label ps-2 mt-2">Username</label>
        <div class="input-group input-group-lg">
          <input type="text" class="form-control mb-1" style="font-size: 15px;" id="examplelastname1" name="userName" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('userName'); ?>" />
          <!-- Resend Button -->
          <input type="submit" value="Update" name="action" class="input-group-text" style="background-color:#ced4da; font-size: 15px; Height: 41px;" id="basic-addon2">
        </div>
        <span class="text-danger"><?php echo form_error('displayName'); ?></span>
      </form>

      <form method="post" class="responsiveInput" action="<?= base_url('updateprofile/updatedisplayname') ?>" autocomplete="off">
        <!-- Display Name -->
        <label for="examplefirstname1" class="form-label ps-2 mt-2">Display Name</label>
        <div class="input-group input-group-lg">
          <input type="text" class="form-control mb-1" style="font-size: 15px;" id="exampleInputlastname1" name="displayName" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('displayName'); ?>" />
          <!-- Resend Button -->
          <input type="submit" value="Update" name="action" class="input-group-text" style="background-color:#ced4da; font-size: 15px; Height: 41px;" id="basic-addon2">
        </div>
        <span class="text-danger"><?php echo form_error('displayName'); ?></span>
      </form>


      <form method="post" class="responsiveInput" action="<?= base_url('updateprofile/updateemail') ?>" autocomplete="off">
        <!-- E-mail Address -->
        <label for="exampleInputEmail1" class="form-label ps-2 mt-2">E-mail Address</label>
        <div class="input-group input-group-lg">
          <input type="email" class="form-control mb-1" style="font-size: 15px;" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('email'); ?>" autocomplete="off" />
          <!-- Resend Button -->
          <input type="submit" value="Update" name="action" class="input-group-text" style="background-color:#ced4da; font-size: 15px; Height: 41px;" id="basic-addon2">
        </div>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
      </form>

      <form method="post" action="<?= base_url('updateprofile/updatedprofile') ?>" autocomplete="off">
        <div class="col d-flex justify-content-start align-items-center">
          <!-- Change Password Button -->
          <input type="submit" name="action" value="Change Password" class="btn btn-sm text-secondary mt-1" style="text-decoration: underline; margin-top: -15px;"></input>
        </div>
        <!-- Deactivate Account Button -->
        <input type="submit" name="action" value="Deactivate Account" class="btn btn-sm text-secondary mt-1" style="text-decoration: underline; margin-top: -15px;"></input>
    </div>

  </div>

  <div class="py-5">&nbsp;</div>
  <style>
    @media (min-width: 768px) {
      .inputbox {
        width: 600px;
      }
    }
    @media (max-width: 425px) {
      section{
        width:100%;
        margin:0;
        padding:0;
        overflow-x:hidden;
      }
      .responsiveInput{
        padding-left:20px;
      }
    }
  </style>







  </div>

</section>
<style>
  @media(min-width:375px) {
    .pic {
      width: 250px;
      height: 250px;
    }
  }
</style>
