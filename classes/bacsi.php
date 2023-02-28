<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>

<?php 
	/**
	* 
	*/
	class bacsi
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_bacsi($date,$files){
			$menu = mysqli_real_escape_string($this->db->link, $date['menu']);
			$Hoten = mysqli_real_escape_string($this->db->link, $date['Hoten']);
			
			
			$Chucvu = mysqli_real_escape_string($this->db->link, $date['Chucvu']);
			$Kinhnghiem = mysqli_real_escape_string($this->db->link, $date['Kinhnghiem']);
			$Diachi = mysqli_real_escape_string($this->db->link, $date['Diachi']);
			
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if ($menu == "" ||  $Hoten == "" || $Chucvu== "" || $Kinhnghiem == "" || $Diachi == "" || $file_name == ""){
				$alert = "<span class='error'>Các trường không được phép trống </span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO bacsi(Id_menu,Hoten,Chucvu,Kinhnghiem,Diachi,image) VALUES('$menu','$Hoten','$Chucvu','$Kinhnghiem','$Diachi','$unique_image') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm bác sĩ thành công </span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Thêm bác sĩ không thành công </span>";
					return $alert;
				}
			}
        }
        public function show_bacsi()
		{
			$query = 
			"SELECT bacsi.*, menu.tenmenu

			 FROM bacsi INNER JOIN menu ON bacsi.Id_menu = menu.Id_menu
								
			 order by bacsi.Id_bacsi asc ";

			
			$result = $this->db->select($query);
			return $result;
		}
		
		public function update_bacsi($data,$files,$id){
            $menu = mysqli_real_escape_string($this->db->link, $data['menu']);
			$Hoten = mysqli_real_escape_string($this->db->link, $data['Hoten']);
			
			
			$Chucvu = mysqli_real_escape_string($this->db->link, $data['Chucvu']);
			$Kinhnghiem = mysqli_real_escape_string($this->db->link, $data['Kinhnghiem']);
			$Diachi = mysqli_real_escape_string($this->db->link, $data['Diachi']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


            if ($menu == "" ||  $Hoten == "" || $Chucvu== "" || $Kinhnghiem == "" || $Diachi == "" ){
				$alert = "<span class='error'>Các trường không được phép trống </span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					
					if (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE bacsi SET
					Hoten = '$Hoten',
					Id_menu = '$menu', 
					Chucvu = '$Chucvu', 
                    Kinhnghiem = '$Kinhnghiem',
                    Diachi = '$Diachi',
					image = '$unique_image'
					
					WHERE Id_bacsi = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE bacsi SET
					Hoten = '$Hoten',
					Id_menu = '$menu', 
					Chucvu = '$Chucvu', 
                    Kinhnghiem = '$Kinhnghiem',
                    Diachi = '$Diachi'
				
					

					WHERE Id_bacsi= '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Bác sĩ Updated thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Bác sĩ Updated không thành công</span>";
						return $alert;
					}
				
			}

		}
		public function del_bacsi($id)
		{
			$query = "DELETE FROM bacsi where Id_bacsi = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Doctor Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Doctor Deleted Not Success</span>";
				return $alert;
			}
		}
		
		

		public function getbacsibyId($id)
		{
			$query = "SELECT * FROM bacsi where Id_bacsi = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}	
		// END BACKEND
		public function getproduct_feathered(){
			$query = "SELECT * FROM tbl_product where type = '1' ";
			$result = $this->db->select($query);
			return $result;
		}	
		public function getproduct_new(){
			$query = "SELECT * FROM tbl_product order by productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}	
		public function get_details($id)
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 WHERE tbl_product.productId = '$id'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>