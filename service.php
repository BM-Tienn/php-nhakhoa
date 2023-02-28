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
            <h1>Gói Khám</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.php">Trang Chủ &nbsp;/</a>
                </li>
                <li>Gói Khám</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->



<!--Service Section khám tổng quát-->
<section class="service-section bg-gray section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Khám sức khỏe tổng quát trẻ em
                <!-- <span>Services</span> -->
            </h3>
            <p>NANCY tự hào là đơn vị phòng khám đa khoa quốc tế ĐẦU TIÊN VÀ DUY NHẤT triển khai các gói khám chuyên sâu cho trẻ em được chia thành các mốc thời gian cụ thể, theo sự phát triển của bé và mối quan tâm của bố mẹ.
               Mỗi gói khám giờ đây không chỉ nhằm mục đích chăm sóc sức khỏe cho các thiên thần nhỏ mà còn được ra đời với tinh thần giúp phụ huynh nuôi con khoa học và ít áp lực hơn với sự tư vấn của bác sỹ chuyên khoa Nhi. 
               Hơn cả việc đáp ứng nhu cầu chăm sóc sức khỏe, sự ra đời của các gói khám nhi khoa mới một lần nữa khẳng định triết lý phục vụ của NANCY: Chúng tôI quan tâm sâu sắc đến vấn đề cốt lõi của chăm sóc sức khỏe, đó là giúp giải tỏa mọi lo lắng và gánh nặng tinh thần của bệnh nhân bên cạnh giải quyết các vấn đề về thể chất đơn thuần.</p>
        </div>
        <div class="row items-container clearfix">
        <?php
			$getctgk = $ctgk-> getctgk_tq();
            if($getctgk)
			{
				while( $result = $getctgk ->fetch_assoc()){
			
		  ?>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.php">
                            <img src="admin/uploads/<?php echo $result['image']?>" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <!-- <span>Better Service At Low Cost</span> -->
                        <a href="service.php">
                            <h6><?php  echo $result['Tenchitietgoikham'] ?></</h6>
                        </a>
                        <p><?php  echo $result['Giatien'] ?></</p>
                    </div>
                </div>
            </div>
            <?php
						
					}
				}
				?>
            
                   
            
            
            
           
        </div>
    </div>
</section>
<!--End Service Section--> 

<!--Service Section khám dinh dưỡng-->
<section class="service-section bg-gray section">
  <div class="container">
      <div class="section-title text-center">
          <h3>Khám dinh dưỡng cho trẻ
              
          </h3>
          <p>Đáp ứng nhu cầu chăm sóc toàn diện về dinh dưỡng cho bé của phụ huynh, Phòng khám Nhi Nancy phát triển các gói khám dinh dưỡng đặc biệt với phương pháp chuyên sâu giúp bác sỹ và cả ba mẹ hiểu đúng nhất về tình trạng dinh dưỡng hiện tại của bé. 
             Theo đó, bác sỹ có thể đưa ra những lời khuyên phù hợp nhất về chế độ dinh dưỡng của bé.</p>
      </div>
      <div class="row items-container clearfix">
      <?php
			$getctgk = $ctgk-> getctgk_dd();
            if($getctgk)
			{
				while( $result = $getctgk ->fetch_assoc()){
			
		  ?>
          <div class="item">
              <div class="inner-box">
                  <div class="img_holder">
                      <a href="service.php">
                          <img src="admin/uploads/<?php echo $result['image']?>" alt="images" class="img-responsive">
                      </a>
                  </div>
                  <div class="image-content text-center">
                      
                      <a href="service.php">
                          <h6><?php  echo $result['Tenchitietgoikham'] ?></h6>
                      </a>
                      <p><?php  echo $result['Giatien'] ?></p>
                  </div>
              </div>
          </div>
          <?php
						
					}
				}
				?>
            
          
         
      
  </div>
</section>
<!--End Service Section--> 

<?php
include("inc/footer.php");

?>
