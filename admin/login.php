<?php
// Gọi file adminlogin
include ('../classes/adminlogin.php');
?>
<?php
    // gọi class adminlogin
   $class = new adminlogin(); 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tendangnhap = $_POST['Tendangnhap'];
        $password =$_POST['Password'];
       $login_check = $class->longin_admin($tendangnhap,$password); // hàm check User and Pass khi submit lên
    }
  ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php 
               if(isset($login_check)){
                    echo $login_check;
                }
             ?>  </span>
			<div>
				<input type="text" placeholder="Username"  name="Tendangnhap"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="Password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Phòng khám nhi Nancy </a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>