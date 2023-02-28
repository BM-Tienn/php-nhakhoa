<?php
include("inc/header.php");

?>



<!--Main Header-->
<nav class="navbar navbar-default">
      <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                        <li class="active">
                              <a href="index.php">Trang Chủ</a>
                        </li>
                        <li>
                              <a href="about.php">Giới Thiệu</a>
                        </li>
                        <li>
                              <a href="service.php">Gói Khám</a>
                        </li>
                        <!-- <li>
                              <a href="gallery.html">Gallery</a>
                        </li> -->
                        <li>
                              <a href="team.php">Đội Ngũ Bác Sỹ</a>
                        </li>
                        <!-- <li>
                              <a href="appointment.html">Appointment</a>
                        </li> -->
                        <li>
                              <a href="blog.php">Tin Tức</a>
                        </li>
                        <!-- <li>
                              <a href="contact.html">Liên Hệ</a>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">
                                    <li>
                                          <a href="#">Action</a>
                                    </li>
                                    <li>
                                          <a href="#">Another action</a>
                                    </li>
                                    <li>
                                          <a href="#">Something else here</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                          <a href="#">Separated link</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                          <a href="#">One more separated link</a>
                                    </li>
                              </ul>
                        </li> -->
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
<!--End Main Header --> 

<!--Page Title-->
<section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
    <div class="container">
        <div class="title-text">
            <h1>Đội Ngũ Bác Sĩ</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.php">Trang Chủ &nbsp;/</a>
                </li>
                <li>Đội Ngũ Bác Sĩ</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<section class="gallery bg-gray">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="section-title text-center">
                  <h3>ĐỘI NGŨ BÁC SỸ 
                      <!-- <span>of Our Hospital</span> -->
                  </h3>
                  <!-- <p>Leverage agile frameworks to provide a robust synopsis for high level overv-
                      <br>iews. Iterative approaches to corporate strategy...</p> -->
              </div>
          </div>
          <?php
			$getdoctor = $bs-> show_bacsi();
            if($getdoctor)
			{
				while( $result = $getdoctor ->fetch_assoc()){
			
		  ?>
          <div class="col-md-4 col-sm-6">
              <div class="gallery-item">
                  <img src="admin/uploads/<?php echo $result['image']?>" class="img-responsive" alt="gallery-image">
                  <!-- <a data-fancybox="images" href=""></a> -->
                   <h3><?php  echo $result['Hoten'] ?></h3>
                  <p><?php  echo $result['Chucvu'] ?></p> 
              </div>
          </div>
          <?php
						
					}
				}
				?>
            
         
   
 
</section>




<?php
include("inc/footer.php");

?>
