<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/menu.php';?>
<?php include '../classes/goikham.php';?>
<?php
  $goikham = new goikham(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
      // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
      $insertgoikham = $goikham -> insert_goikham($_POST, $_FILES);
 }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm danh sách gói khám </h2>
        <?php 
            if(isset($insertgoikham)){
                echo $insertgoikham;
            }
         ?>   
        <div class="block">               
         <form action="goikhamadd.php" method="post" enctype="multipart/form-data">
          <!-- enctype dùng cho form để thêm hình ảnh  -->
            <table class="form">
            <tr>
                    <td>
                        <label>Menu</label>
                    </td>
                    <td>
                        <select id="select" name="menu">
                            <option>Select menu</option>
                            <?php
                            $menu = new menu();
                            $menuList = $menu->show_menu();
                             if($menuList)
                             {
                                 while($result=$menuList->fetch_assoc()){
                             
                            ?>
                            <option value="<?php echo $result['Id_menu'] ?>"><?php echo $result['tenmenu'] ?></option>
                            <?php
                               }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên gói khám </label>
                    </td>
                    <td>
                        <input type="text" name="Tengoikham" placeholder="" class="medium" />
                    </td>
                </tr>
               
				
				 
				
            
               

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


