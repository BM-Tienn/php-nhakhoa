<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/goikham.php';?>
<?php include '../classes/chitietgk.php';?>
<?php
  $chitietgk = new chitietgk(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
      // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
      $insertCTGK = $chitietgk -> insert_ctgk($_POST, $_FILES);
 }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Chi tiết các gói khám  </h2>
        <?php 
            if(isset($insertCTGK)){
                echo $insertCTGK;
            }
         ?>   
        <div class="block">               
         <form action="chitietgoikhamadd.php" method="post" enctype="multipart/form-data">
          <!-- enctype dùng cho form để thêm hình ảnh  -->
            <table class="form">
            <tr>
                    <td>
                        <label>Gói khám </label>
                    </td>
                    <td>
                        <select id="select" name="goikham">
                            <option>Lựa chọn gói khám </option>
                            <?php
                            $goikham = new goikham();
                            $goikhamList = $goikham->show_goikham();
                             if($goikhamList)
                             {
                                 while($result=$goikhamList->fetch_assoc()){
                             
                            ?>
                            <option value="<?php echo $result['Id_goikham'] ?>"><?php echo $result['Tengoikham'] ?></option>
                            <?php
                               }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên chi tiết gói khám  </label>
                    </td>
                    <td>
                        <input type="text" name="Tenchitietgoikham" placeholder="" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá tiền   </label>
                    </td>
                    <td>
                        <input type="text" name="Giatien" placeholder="" class="medium" />
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


