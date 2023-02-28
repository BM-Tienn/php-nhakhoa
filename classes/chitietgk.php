<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>

<?php 
	/**
	* 
	*/
	class chitietgk
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_ctgk($date,$files){
			$goikham = mysqli_real_escape_string($this->db->link, $date['goikham']);
			$Tenchitietgoikham = mysqli_real_escape_string($this->db->link, $date['Tenchitietgoikham']);
			
			
			$Giatien = mysqli_real_escape_string($this->db->link, $date['Giatien']);
			
			
			 
			
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

			if ($goikham == "" ||  $Tenchitietgoikham == "" || $Giatien== "" || $file_name == ""){
				$alert = "<span class='error'>Các trường không được phép trống </span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO chitietgoikham(Tenchitietgoikham,image,Giatien,Id_goikham) VALUES('$Tenchitietgoikham','$unique_image','$Giatien','$goikham') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm  chi tiết gói khám thành công </span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Thêm chi tiết gói khám  không thành công </span>";
					return $alert;
				}
			}
        }
        public function show_ctgk()
		{
			$query = 
			"SELECT chitietgoikham.*, goikham.Tengoikham

			 FROM chitietgoikham INNER JOIN goikham ON chitietgoikham.Id_goikham = goikham.Id_goikham
								
			 order by chitietgoikham.Id_ctgk desc ";

			
			$result = $this->db->select($query);
			return $result;
		}
		
		public function update_ctgk($data,$files,$id){
            $goikham = mysqli_real_escape_string($this->db->link, $data['goikham']);
			$Tenchitietgoikham = mysqli_real_escape_string($this->db->link, $data['Tenchitietgoikham']);
			
			
			$Giatien = mysqli_real_escape_string($this->db->link, $data['Giatien']);
			
           
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
           
           
            if ($goikham == "" ||  $Tenchitietgoikham == "" || $Giatien== "" || $file_name == ""){
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
					$query = "UPDATE chitietgoikham SET
					Tenchitietgoikham = '$Tenchitietgoikham',
					image = '$unique_image',
					Giatien= '$Giatien', 
                    Id_goikham = '$goikham'
                  
					
					
					WHERE Id_ctgk = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE Chitietgoikham SET
                    Tenchitietgoikham = '$Tenchitietgoikham',
					Giatien= '$Giatien', 
                    Id_goikham = '$goikham'
                  

					WHERE Id_ctgk= '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Chi tiết gói khám Updated thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Chi tiết gói khám Updated không thành công</span>";
						return $alert;
					}
				
			}

		}
		public function del_ctgk($id)
		{
			$query = "DELETE FROM chitietgoikham where Id_ctgk = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'> Chi tiết gói khám Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Chi tiết gói khám  Deleted Not Success</span>";
				return $alert;
			}
		}
		
		

		public function getctgkbyId($id)
		{
			$query = "SELECT * FROM chitietgoikham where Id_ctgk = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}	
		public function getctgk_tq(){
			$query = "SELECT * FROM chitietgoikham where Id_goikham = '2' ";
			$result = $this->db->select($query);
			return $result;
		}	
		public function getctgk_dd(){
			$query = "SELECT * FROM chitietgoikham where Id_goikham = '3' ";
			$result = $this->db->select($query);
			return $result;
		}	
	}
	
		
 ?>