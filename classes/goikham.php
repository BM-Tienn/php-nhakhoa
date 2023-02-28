<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>

<?php 
	/**
	* 
	*/
	class goikham
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_goikham($date,$files){
			$menu = mysqli_real_escape_string($this->db->link, $date['menu']);
			$Tengoikham = mysqli_real_escape_string($this->db->link, $date['Tengoikham']);
			
			
			
			
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			
			

			if ($menu == "" ||  $Tengoikham == "" ){
				$alert = "<span class='error'>Các trường không được phép trống </span>";
				return $alert;
			}else{
				

				$query = "INSERT INTO goikham(Id_menu,Tengoikham) VALUES('$menu','$Tengoikham') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm gói khám thành công </span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Thêm gói khám không thành công </span>";
					return $alert;
				}
			}
        }
        public function show_goikham()
		{
			$query = 
			"SELECT goikham.*, menu.tenmenu

			 FROM goikham INNER JOIN menu ON goikham.Id_menu = menu.Id_menu
								
			 order by goikham.Id_goikham desc ";

			
			$result = $this->db->select($query);
			return $result;
		}
		
		public function update_goikham($data,$files,$id){
            $menu = mysqli_real_escape_string($this->db->link, $data['menu']);
            $Tengoikham = mysqli_real_escape_string($this->db->link, $data['Tengoikham']);
           
			
			if(empty($menu || $Tengoikham)){
                $alert = "<span class='success'>Các trường không được trống </span>";
                return $alert;
            }else{
                $query = "UPDATE goikham SET Id_menu='$menu',Tenmenu='$Tenmenu' WHERE Id_goikham='$id'";
                $result = $this->db->update($query);
                    if($result){
                        $result="<span class='success'> Cập nhập  thành công</span>";
                        return $result;
                    }else{
                        $result="<span class='error'>Cập nhập không thành công</span>";
                        return $result;
                    }

        
                }
			
			
			


           

		}
		public function del_goikham($id)
		{
			$query = "DELETE FROM goikham where Id_goikham = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Doctor Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Doctor Deleted Not Success</span>";
				return $alert;
			}
		}
		
		

		public function getgoikhambyId($id)
		{
			$query = "SELECT * FROM goikham where Id_goikham = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}	
		
	}
 ?>