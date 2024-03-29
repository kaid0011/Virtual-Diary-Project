<section class="p-5" style="background-color: #e9ecef; min-height: 75vh;">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md p-0 mt-0 ">
            <img src="<?= base_url('assets/images/login/pic1.png') ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md p-5">
                <h1 class="h1 mb-4 pt-1 text-dark">Report User</h1>
                <p class="lead">
                <form action="<?= base_url('reportuser/submitpublicnbreport') ?>" method="post">
                 <?php
                 if ($publicnbdata->num_rows() > 0) {
                    foreach ($publicnbdata->result() as $row) {
                 ?>
                <input type="text" name="page_ID" id="post_ID" class="btn float-end mt-1" value="<?php echo $row->publicNBPage_ID ?>" hidden>
                <input type="text" name="reporteduser_ID" id="reporteduser_ID" class="btn float-end mt-1" value="<?php echo $row->publicNB_ID ?>" hidden> 
                <?php
                    }
                }
                ?>

                <!-- reason -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                         <select class="form-control" id="exampleFormControlSelect1" name="category">
                              <option>Violence</option>
                              <option>Harassment</option>
                              <option>Suicide or Self Injury</option>
                              <option>False Information</option>
                              <option>Terrorism</option>
                              <option>Something else</option>
                            </select>
                        </div>
                    <!-- Details -->
                        <div class="mb-3">
                            <label for="examplefirstname1" class="form-label pt-2">Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="details" rows="4"></textarea>
                        </div>
                    
                    <!-- By report -->
                        <div class="mb-3">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="text-muted"> Report Ticket will be checked by the support team.<br>It may take a few days. Thank you for your understanding.<br><a href="<?=base_url('reportuser/termsofservice')?>" class="text-reset"> Terms of Service </a> and <a href="<?=base_url('reportuser/privacypolicy')?>" class="text-reset">Privacy Policy</a> </p>
                            </label>
                  <!-- Report Button -->
                  <div class="col-md d-flex justify-content-end align-items-center">
                      <input type="submit" value="Submit" name="action" style="background-color: #f0b63a; width: 75px;" class="p-2 btn-sm border border-2 border-dark btn-end">
                    </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</section>
