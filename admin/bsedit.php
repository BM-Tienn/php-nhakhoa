<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/bacsi.php';  ?>
<?php include '../classes/menu.php';  ?> 

<?php
    // gọi class category
    $bs = new bacsi();
    if(!isset($_GET['bsid']) || $_GET['bsid'] == NULL){
        echo "<script> window.location = 'bacsilist.php' </script>";
        
    }else {
        $id = $_GET['bsid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateBacsi = $bs -> update_bacsi($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh sách bác sĩ </h2>
        <?php 
            if(isset($updateBacsi)){
                echo $updateBacsi;
            }
         ?>
         <?php 
         $get_bacsi_by_id = $bs->getbacsibyId($id);
         if($get_bacsi_by_id){
            while ($result_bs = $get_bacsi_by_id->fetch_assoc()) {
                # code...
            
          ?>   
        <div class="block">
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <tr>
                    <td>
                        <label>Menu</label>
                    </td>
                    <td>
                        <select id="select" name="menu">
                            <option>Lựa chọn menu</option>
                            <?php 
                            $menu = new menu();
                            $menulist = $menu->show_menu();
                            if($menulist){
                                while ($result = $menulist->fetch_assoc()){
                            
                             ?>
                            <option 
                            <?php 
                            if($result['Id_menu']==$result_bs['Id_menu'])
                                { echo 'selected'; }
                             ?>    
                            value=" <?php echo $result['Id_menu'] ?> "> <?php echo $result['tenmenu'] ?></option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label>Họ và tên </label>
                    </td>
                    <td>
                        <input name="Hoten" value="<?php echo $result_bs['Hoten'] ?>" type="text" class="medium" />
                    </td>
                </tr>
    
                <tr>
                    <td>
                        <label>Chức vụ</label>
                    </td>
                    <td>
                        <input name="Chucvu" value="<?php echo $result_bs['Chucvu'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                
                
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Kinh nghiệm</label>
                    </td>
                    <td>
                        <textarea name="Kinhnghiem" class="tinymce"><?php echo $result_bs['Kinhnghiem'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Địa chỉ </label>
                    </td>
                    <td>
                        <input name="Diachi" value="<?php echo $result_bs['Diachi'] ?>" type="text" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_bs['image'] ?>" width="100"><br>
                        <input name="image" type="file" />
                    </td>
                </tr>
                
                

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
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


