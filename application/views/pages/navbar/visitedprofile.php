<section style="background-color: #e9ecef; min-height: 75vh; padding-top: 80px; padding-bottom: 20px;">
  <div class="container">
    <!--div class="p-5 text-center bg-image" style="background-image: url('imgs/white.png'); height: 300px; width: auto;"-->
    <div>
      <?php
      if ($findUser->num_rows() > 0) {
      ?>
        <?php
        foreach ($findUser->result() as $row) {
        ?>

          <div class="d-flex justify-content-center align-items-center h-100 ms-5 me-5">
            <div class="text-white">
              <div class="justify-content-center align-items-center text-center ps-5">
                <?php $source = $this->Mainpage_model->getImage($row->user_ID); ?>
                <a href="#"><img src="<?= base_url($source) ?>" style="height: 200px; width: 200px; border-radius: 100px; object-fit: cover;"></a>
              </div>

              <h1 class="lead text-center text-dark mt-1 ms-5 mb-5 fw-normal"><?php echo $row->displayName; ?><br>
                <a class="text-secondary" style="text-decoration: none;">@<?php echo $row->userName; ?></a>
              </h1>

            <?php
          }
            ?>

            </div>
          </div>

          <div name="userFound" class="container">
            <div class="row g-4 ">

              <!--Public Notebook-->
              <div class="d-flex justify-content-center">
                <!-- if discussion is included:  
                      <div class="col-md-6 col-lg-7 mt-5">-->
                <div class="card bg-light" style="min-height: 400px;width: 1000px;">
                  <nav class="navbar navbar-light justify-content-center" style="background-color: #495057;">
                    <p class=" justify-content-center align-items-center mt-2" style=" color: #eee;"> Public Notebook</p>
                  </nav>
                  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                    <?php
                    foreach ($findUserPublicNB->result() as $row) {
                      $theme = $row->pageTheme;
                      if ($theme == "Dark") {
                        $themeurl = "assets/images/themes/Theme2_Dark.jpg";
                        $themecardcolor = '#f8f9fa';
                        $themecardbgurl = 'assets/images/themes/Darkcard.jpg';
                        $fontcolor = '#f8f9fa';
                      } else if ($theme == "Light") {
                        $themeurl = "assets/images/themes/Theme1_Light.jpg";
                        $themecardcolor = '#212529';
                        $themecardbgurl = 'assets/images/themes/LightCard.jpg';
                        $fontcolor = '#212529';
                      } else if ($theme == "Apple") {
                        $themeurl = "assets/images/themes/Theme3_Apple.jpg";
                        $themecardcolor = '#212529';
                        $themecardbgurl = 'assets/images/themes/AppleCard.jpg';
                        $fontcolor = '#212529';
                      } else if ($theme == "Orange") {
                        $themeurl = "assets/images/themes/Theme4_Orange.jpg";
                        $themecardcolor = '#212529';
                        $themecardbgurl = 'assets/images/themes/OrangeCard.jpg';
                        $fontcolor = '#212529';
                      } else if ($theme == "Kiwi") {
                        $themeurl = "assets/images/themes/Theme5_Kiwi.jpg";
                        $themecardcolor = '#212529';
                        $themecardbgurl = 'assets/images/themes/KiwiCard.jpg';
                        $fontcolor = '#212529';
                      }
                    ?>


                      <div class="card-body text-center" style="height: auto; background-image: url(<?= base_url($themeurl) ?>); color: <?php echo $fontcolor ?>;">

                        <div>

                          <div class="card border-dark my-5 " style="max-width: 75rem;height:250px; background-image: url(<?= base_url($themecardbgurl) ?>); color: <?php echo $themecardcolor ?>;">

                            <!-- Hidden Page and User ID -->
                            <input type="text" name="page_ID" id="page_ID" class="btn float-end mt-1" value="<?php echo $row->publicNBPage_ID ?>" hidden>
                            <input type="text" name="visitedUser_ID" id="visitedUser_ID" class="btn float-end mt-1" value="<?php echo $row->publicNB_ID ?>" hidden>

                            <nav class="navbar navbar-light">
                              <ul class="nav nav-pills ms-2">
                                <li class="nav-item  ">
                                  <p class="nav-link " href="#" style="color:<?php echo $fontcolor ?>;">Date: <?php echo $row->pageDate; ?></p>
                                </li>
                              </ul>
                            </nav>

                            <div class="card-body">
                              <p class="card-text1"><?php echo $row->pageInput; ?></p>
                            </div>

                            <div class="card-footer bg-transparent border-dark">
                              <div>
                                <!-- React Button -->
                                <input type="text" id="accountVisitor_ID" name="accountVisitor_ID" value="<?php echo $this->session->userdata('user_ID'); ?>" hidden>
                                <button id="react" class="btn btn-none btn-sm float-start" value="<?php echo $row->publicNBPage_ID ?>"><i class="bi bi-star h4"></i></button>

                                <!-- Report Button -->
                                <form action="<?= base_url('reportuser/getPublicNBData') ?>" method="post">
                                  <input type="text" name="page_ID" id="page_ID" style="color: #e9ecef;" class="btn float-end mt-1" value="<?php echo $row->publicNBPage_ID ?>" hidden>
                                  <input type="text" name="reporteduser_ID" id="reporteduser_ID" class="btn float-end mt-1" value="<?php echo $row->publicNB_ID ?>" hidden>

                                  <input type="submit" name="action" value="Report" class="btn btn-secondary btn-sm float-end mt-1">
                                </form>
                              </div>
                            </div>

                          </div>

                        </div>

                      </div>
                    <?php
                    }
                    ?>
                  </div>

                </div>

              </div>

            </div>
          </div>

        <?php

      } else {
        ?>

          <h1 class="lead text-center text-dark mt-4 ms-5 mb-5 fw-normal" style="padding-top: 25vh;">User doesn't exists.<br>

          <?php
        }
          ?>

    </div>
  </div>
</section>

<!-- AJAX for Reactions -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $(document).on("click", "#react", function(e) {
    e.preventDefault();

    var accountVisitor_ID = $("#accountVisitor_ID").val();
    var publicNBPage_ID = $(this).attr("value");

    $.ajax({
      url: "<?php echo base_url(); ?>React/addReact_PublicPage",
      type: "post",
      dataType: "json",
      data: {
        accountVisitor_ID: accountVisitor_ID,
        publicNBPage_ID: publicNBPage_ID,
      },
      success: function(data) {
        if (data.response == "added") {
          alert("added");
        } else {
          alert("deleted");
        }
      }
    });
  });
</script>

<!-- End of AJAX for Reactions -->


<style>
  .scrollspy-example {
    height: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .scrollspy-example::-webkit-scrollbar {
    width: 10px;
  }

  .scrollspy-example::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    -webkit-border-radius: 0px;
    border-radius: 3px;
  }

  .scrollspy-example::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    -webkit-border-radius: 0px;
    background: rgb(149, 153, 165);
    border-radius: 3px;
    height: 5px;
  }

  /*  .card-text {
    min-height: 200px;
  }
  
  .title {
    color: #fff;
    margin: 5px;
  }
  .items {
    background-color: #fff;
    border: 1px solid #d1d1d1;
    margin: 10px;
    padding: 5px;
  }
 
  
*/
</style>