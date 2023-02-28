<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/menu.php';?>
<?php
    // gọi class menu
   $menu = new menu(); 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tenmenu = $_POST['tenmenu'];
        
       $insertMenu = $menu->insert_menu($tenmenu); // hàm check User and Pass khi submit lên
    }
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm menu</h2>
                <?php
                if(isset($insertMenu))
                {
                    echo $insertMenu;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="menuadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="tenmenu" placeholder="Nhập tên menu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>