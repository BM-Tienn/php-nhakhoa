<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin(); // gọi hàm check login để ktra session
    include ($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>
<?php 
    /**
    * 
    */
    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function longin_admin($Tendangnhap,$Password){
            $Tendangnhap = $this->fm->validation($Tendangnhap); //gọi ham validation từ file Format để ktra
            $Password = $this->fm->validation($Password);

            $Tendangnhap = mysqli_real_escape_string($this->db->link, $Tendangnhap);
            $Password = mysqli_real_escape_string($this->db->link, $Password); //mysqli gọi 2 biến. (Tendangnhap and link) biến link -> gọi conect db từ file db
            
            if(empty($Tendangnhap) || empty($Password)){
                $alert = "User and Pass không nhập rỗng";
                return $alert;
            }else{
                $query = "SELECT * FROM admin WHERE Tendangnhap = '$Tendangnhap' AND Password = '$Password' LIMIT 1 ";
                $result = $this->db->select($query);

                if($result != false){
                    session_start();
                    
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true); // set adminlogin đã tồn tại
                    // gọi function Checklogin để kiểm tra true.
                    Session::set('Id_admin', $value['Id_admin']);
                    Session::set('Tendangnhap', $value['Tendangnhap']);
                    Session::set('Password', $value['Password']);
                    Session::set('Hoten', $value['Hoten']);
                    Session::set('Email', $value['Email']);
                    
                    header("Location:index.php");
                }else {
                    $alert = "User and Pass not match";
                    return $alert;
                }
            }

        }
    }
 ?>

