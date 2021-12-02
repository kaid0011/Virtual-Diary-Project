<section class="p-5" style="background-color: #e9ecef; min-height: 75vh;">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md p-0 mt-0 ">
              <img src="https://picsum.photos/500/500" class="img-fluid d-none d-sm-block">
            </div>
            <div class="col-md p-5">
                <h1 class="display-1 mb-4 pt-1 text-dark">Report User</h1>
                <p class="lead">
                    <form method="post" action="" autocomplete="off">
                    <!-- Username -->
                        <div class="mb-3">
                            <label for="" class="form-label"> Report Username</label>
                            <input type="text" class="form-control mb-1" id="" aria-describedby="emailHelp" name="userName" value="" />
                            <span class="text-danger"><?php echo form_error('userName'); ?></span> <!-- print error message if there is any -->
                        </div>
                    <!-- reason -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Violence</option>
                              <option>Harassment</option>
                              <option>Suicide or Self Injury</option>
                              <option>False Information</option>
                              <option>Hate Speech</option>
                              <option>Terrorism</option>
                              <option>Something else</option>
                            </select>
                        </div>
                    <!-- Details -->
                        <div class="mb-3">
                            <label for="examplefirstname1" class="form-label">Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                    <!-- Email Address -->
                        <div class="mb-3">
                            <label for="" class="form-label"> Email Address (optional)</label>
                            <input type="text" class="form-control mb-1" id="" aria-describedby="emailAdd" name="" value="" />
                        </div>
                    <!-- By report -->
                        <div class="mb-3">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="text-muted"> Report Ticket will be check by admins. It will take few days, Thanks! <br><a href="#" class="text-reset"> Terms of Service </a> and <a href="#" class="text-reset">Privacy Policy</a> </p>
                            </label>
                  <!-- Report Button -->
                        <input type="submit" name="Report" value="Report" style="background-color: #f0b63a;" class="btn-lg border border-3 border-dark"></input>
                    </form>
                </p>
            </div>
        </div>
    </div>
</section>