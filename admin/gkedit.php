<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/goikham.php';  ?>
<?php include '../classes/menu.php';  ?> 

<?php
    // gọi class category
    $gk = new goikham();
    if(!isset($_GET['gkid']) || $_GET['gkid'] == NULL){
        echo "<script> window.location = 'goikhamlist.php' </script>";
        
    }else {
        $id = $_GET['gkid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateGoikham = $gk -> update_goikham($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh sách gói khám </h2>
        <?php 
            if(isset($updateGoikham)){
                echo $updateGoikham;
            }
         ?>
         <?php 
         $get_goikham_by_id = $gk->getgoikhambyId($id);
         if($get_goikham_by_id){
            while ($result_goikham = $get_goikham_by_id->fetch_assoc()) {
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
                            if($result['Id_menu']==$result_goikham['Id_menu'])
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
                        <label>Tên gói khám </label>
                    </td>
                    <td>
                        <input name="Tengoikham" value="<?php echo $result_goikham['Tengoikham'] ?>" type="text" class="medium" />
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


