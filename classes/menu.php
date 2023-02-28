<?php
    $filepath = realpath(dirname(__FILE__));
    
    include_once ($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>
<?php 
    /**
    * 
    */
    class menu
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_menu($tenmenu){
            $tenmenu = $this->fm->validation($tenmenu); //gọi ham validation từ file Format để ktra
          

            $tenmenu = mysqli_real_escape_string($this->db->link, $tenmenu);
           //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db
            
            if(empty($tenmenu)){
                $alert = "<span class='success'>Menu không được phép trống</span>";
                return $alert;
            }else{
                $query = "INSERT INTO menu( tenmenu) VALUES('$tenmenu')";
                $result = $this->db->insert($query);
                    if($result){
                        $result="<span class='success'>Thêm menu thành công</span>";
                        return $result;
                    }else{
                        $result="<span class='error'>Thêm menu không thành công </span>";
                        return $result;
                    }

        
                }
            } 
            public function show_menu(){
                $query = "SELECT* FROM menu order by Id_menu desc";
                $result = $this->db->select($query);
                return $result;
            } 
            public function update_menu($tenmenu,$id){
                $tenmenu = $this->fm->validation($tenmenu); //gọi ham validation từ file Format để ktra
          

                $tenmenu = mysqli_real_escape_string($this->db->link, $tenmenu);
                $id=mysqli_real_escape_string($this->db->link, $id);
               //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db
                
                if(empty($tenmenu)){
                    $alert = "<span class='success'>Vui lòng điền tên menu</span>";
                    return $alert;
                }else{
                    $query = "UPDATE menu SET tenmenu='$tenmenu' WHERE Id_menu='$id'";
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
            public function del_menu($id){
                $query = "DELETE FROM menu WHERE Id_menu='$id'";
                $result = $this->db->delete($query);
                if($result){
                    $result="<span class='success'> Xóa tên menu thành công</span>";
                    return $result;
                }else{
                    $result="<span class=''error> Xóa tên menu không thành công</span>";
                    return $result;
                }

            }
            public function getmenubyId($id){
                $query = "SELECT* FROM menu WHERE Id_menu='$id'";
                $result = $this->db->select($query);
                return $result;
            } 
            
    }
 ?>

