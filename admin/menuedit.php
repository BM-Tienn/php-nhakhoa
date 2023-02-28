<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/menu.php';  ?>
<?php
    $menu= new menu(); 
    if(!isset($_GET['menuid']) || $_GET['menuid'] == NULL){
        echo "<script> window.location = 'menulist.php' </script>";
        
    }else {
        $id = $_GET['menuid']; // Lấy catid trên host
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tenmenu = $_POST['tenmenu'];
        $updateMenu = $menu -> update_menu($tenmenu,$id); // hàm check catName khi submit lên
        
    }
    
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa menu</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($updateMenu)){
                        echo $updateMenu;
                    }
                 ?>
                 <?php 
                    $get_menu_name = $menu->getmenubyId($id);
                    if($get_menu_name){
                        while ($result = $get_menu_name->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['tenmenu']; ?>" name="tenmenu" placeholder="Sửa tên menu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php 
                        }
                    }
                     ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>